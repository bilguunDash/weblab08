<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Account;

class TransactionController extends Controller
{
    public function showTransaction()
    {
        return view('transaction');
    }

    public function registerPost(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'transaction_from' => 'required|exists:account,account_number',
                'transaction_to' => 'required|exists:account,account_number',
                'transaction_amount' => 'required|numeric',
                'transaction_description' => 'required',
            ]);

            $sender_account = Account::where('account_number', $request->transaction_from)->first();
            $receiver_account = Account::where('account_number', $request->transaction_to)->first();

            // Гүйлгээ хийхэд данс байгаа эсэхийг шалгах
            if (!$sender_account || !$receiver_account) {
                throw new \Exception('Гүйлгээ хийхэд ашиглах байгаа данс олдсонгүй.');
            }

            // Мөнгөн шилжүүлэг хийх
            if ($sender_account->account_balance < $request->transaction_amount) {
                throw new \Exception('Гүйлгээ хийхэд шилжүүлэгийн мөнгө хүрэлцэхгүй байна. Таны үлдэгдэл: '.$sender_account->account_balance);
            }

            $transaction = Transaction::create([
                'transaction_from' => $sender_account->account_number,
                'transaction_to' => $receiver_account->account_number,
                'transaction_amount' => $request->transaction_amount,
                'transaction_description' => $request->transaction_description,
            ]);

            // Дансны үлдэгдэл шинэчлэх
            $sender_account->update(['account_balance' => $sender_account->account_balance - $request->transaction_amount]);
            $receiver_account->update(['account_balance' => $receiver_account->account_balance + $request->transaction_amount]);

            DB::commit();
            return redirect('transaction')->with('success', 'Гүйлгээ амжилттай хийгдлээ.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['db_error' => $e->getMessage()])->withInput();
        }
    }


    public function aa()
    {
        try {
            // Гүйлгээний мэдээллийг үзүүлэх
            $transactions = Transaction::all();

            // Хэрэглэгчдийн данс байгаа эсэхийг шалгах
            $accounts = Account::all();

            return view('transactiondetail', compact('transactions', 'accounts'));
        } catch (\Exception $e) {
            return redirect('transaction')->with('error', $e->getMessage());
        }
    }
}

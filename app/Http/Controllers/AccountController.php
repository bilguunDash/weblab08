<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;

class AccountController extends Controller
{
        public function account()
           {
               $account = Account::all();
               return view('account', compact('account'));
           }

            public function getById(Request $request)
               {
                   $transaction = Transaction::find($request->id);
                  return view('accountdetail', compact('transaction'));
               }
           }


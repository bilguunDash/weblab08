<!-- accountdetail.blade.php -->

@extends('master')

@section('title', 'Account Detail')

@section('content')
    <div class="content-container">
        <h1>Account Detail</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Transaction From</th>
                    <th scope="col">Transaction To</th>
                    <th scope="col">Transaction Amount</th>
                    <th scope="col">Transaction Description</th>
                </tr>
            </thead>
            <tbody>
                @if ($transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->transaction_from }}</td>
                        <td>{{ $transaction->transaction_to }}</td>
                        <td>{{ $transaction->transaction_amount }}</td>
                        <td>{{ $transaction->transaction_description }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="5">No transaction details found for this account.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection


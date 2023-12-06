<!-- accountdetail.blade.php -->

@extends('master')

@section('title', 'Transaction Detail')

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
             @forelse ($transactions as $tr)
                 <tr>
                     <td>{{ $tr->id }}</td>
                     <td>{{ $tr->transaction_from }}</td>
                     <td>{{ $tr->transaction_to }}</td>
                     <td>{{ $tr->transaction_amount }}</td>
                     <td>{{ $tr->transaction_description }}</td>
                 </tr>
             @empty
                 <tr>
                     <td colspan="5">No transaction details found for this account.</td>
                 </tr>
             @endforelse
         </tbody>
     </table>

    </div>
@endsection

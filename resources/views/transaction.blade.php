@extends('master')

@section('title', 'Гүйлгээ хийх хэсэг')

@section('content')

<form action="{{ url('transaction') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="transaction_from" class="form-label">Transaction From</label>
        <input type="text" name="transaction_from" class="form-control" placeholder="Transaction From" required>
    </div>

    <div class="mb-3">
        <label for="transaction_to" class="form-label">Transaction To</label>
        <input type="text" name="transaction_to" class="form-control" placeholder="Transaction To" required>
    </div>

    <div class="mb-3">
        <label for="transaction_amount" class="form-label">Transaction Amount</label>
        <input type="text" name="transaction_amount" class="form-control" placeholder="Transaction Amount" required>
    </div>

    <div class="mb-3">
        <label for="transaction_description" class="form-label">Description</label>
        <input type="text" name="transaction_description" class="form-control" placeholder="Transaction Description" required>
    </div>

    <button type="submit">Гүйлгээ хийх</button>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</form>

@endsection



@extends('master')

@section('title', 'Account List')

@section('content')
    <div class="content-container">
        <h1>Account List</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Дансны дугаар</th>
                    <th scope="col">Дансны нэр</th>
                    <th scope="col">Дансны үлдэгдэл</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($account as $account)
                    <tr>
                        <th scope="row">{{ $account->id }}</th>
                        <td>
                            <a href="{{ route('accountdetail', ['id' => $account->id]) }}">
                                {{ $account->account_number }}
                            </a>
                        </td>
                        <td>{{ $account->account_name }}</td>
                        <td>{{ $account->account_balance }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No accounts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection



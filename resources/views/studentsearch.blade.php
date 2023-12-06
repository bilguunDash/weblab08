@extends('master')

@section('title', 'Search by ID')

@section('content')
    <h1>Search by ID</h1>
    <form action="{{ url('search') }}" method="post">
        @csrf
        Enter an ID: <input type="text" name="sid" value="{{ old('sid') }}"><br>
        <input type="submit">
    </form>

    @if(isset($aStudent))
        <h1>Result</h1>
        <ul>
            <li>ID: {{ $aStudent[0] }}</li>
            <li>Name: {{ $aStudent[1] }}</li>
            <li>Age: {{ $aStudent[2] }}</li>
        </ul>
    @elseif($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection




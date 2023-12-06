@extends('master')

@section('title', '')

@section('content')
    <div class="content-container">
        <h1>Student List</h1>

        <form action="{{ url('student') }}" method="post">
            {{ csrf_field() }}
        </form>

        <ul class="student-list">
            @forelse($students as $student)
                <li><a href="{{ url('student/' . $student[0]) }}">{{ $student[0] }}</a></li>
            @empty
                <li>No students found</li>
            @endforelse
        </ul>
    </div>
@endsection

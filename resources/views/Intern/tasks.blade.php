@extends('layout')

@section('content')
<h1>Your Tasks</h1>
<ul>
    @foreach($tasks as $task)
        <li>{{ $task->title }}</li>
    @endforeach
</ul>
@endsection

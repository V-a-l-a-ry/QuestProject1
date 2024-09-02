@extends('Layouts')

@section('content')
<h1>Intern Dashboard</h1>
<h1>Welcome, {{ $user->name }}!</h1>
<ul>
    <li><a href="{{ route('intern.profile') }}">View Profile</a></li>
    <li><a href="{{ route('intern.tasks') }}">See Tasks</a></li>
    <li><a href="{{ route('intern.skills') }}">View & Edit Skills</a></li>
    <li><a href="{{ route('intern.groups') }}">View Group</a></li>
    <li><a href="{{ route('intern.feedback') }}">View Feedback</a></li>
</ul>
@endsection

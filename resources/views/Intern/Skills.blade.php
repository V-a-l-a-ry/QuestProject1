@extends('Layouts')

@section('content')
<h1>Your Skills</h1>
<ul>
    @foreach($skills as $skill)
        <li>{{ $skill->name }}</li>
    @endforeach
</ul>
@endsection

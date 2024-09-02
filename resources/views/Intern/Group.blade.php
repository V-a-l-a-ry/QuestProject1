@extends('Layouts')

@section('content')
<h1>Your Groups</h1>
<ul>
    @foreach($groups as $group)
        <li>{{ $group->name }}</li>
    @endforeach
</ul>
@endsection

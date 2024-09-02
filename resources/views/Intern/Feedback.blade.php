@extends('Layouts')

@section('content')
<h1>Your Feedback</h1>
<ul>
    @foreach($feedback as $item)
        <li>{{ $item->message }}</li>
    @endforeach
</ul>
@endsection

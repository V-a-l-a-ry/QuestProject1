@extends('layouts.app')

@section('content')


<form action="{{ route('create.group') }}" method="POST">
    @csrf
    <div>
        <label for="name">Group-Name</label>
        <input type="text" id="group" name="group" required>
    </div>
  

    <!-- Add other fields as needed -->
    <button type="submit">Create Group</button>
</form>
@endsection
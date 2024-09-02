@extends('Layouts')

@section('content')
<form action="{{ route('intern.profile.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
<h1>Intern Profile</h1>
<p>Name: {{ $profile->name }}</p>
<p>Email: {{ $profile->email }}</p>
<button type="submit">Update Profile</button>
</form>
<div style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center;" id="profileModal">
  <div style="background-color: #fff; padding: 20px; border-radius: 8px; width: 100%; max-width: 500px;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <h5 style="margin: 0;">Edit Profile</h5>
      <button style="background: none; border: none; font-size: 20px;" onclick="closeModal()">×</button>
    </div>
    <div style="margin-top: 20px;">
      <form action="{{ route('intern.profile.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Profile fields -->
        <div style="margin-bottom: 15px;">
          <label for="name" style="display: block; margin-bottom: 5px;">Name</label>
          <input type="text" id="name" name="name" value="{{ $user->name }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
          <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
          <input type="email" id="email" name="email" value="{{ $user->email }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Save changes</button>
      </form>
    </div>
  </div>
</div>

<script>
    function closeModal() {
        document.getElementById('profileModal').style.display = 'none';
    }

    window.onload = function() {
        var modal = document.getElementById('profileModal');
        modal.style.display = 'flex';
    };
</script>

@endsection

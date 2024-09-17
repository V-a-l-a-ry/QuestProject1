@extends('layouts.app')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Group Management</title>
  
<!--   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
</head>
<body class="bg-gray-200">

  <!-- Container -->

    <!-- Page Header -->
   

    <!-- Groups List -->


  <!-- Modal for Creating New Group -->
  <div class="container bg-green-600 mx-auto p-4">

    <div class="bg-white rounded-lg p-12 w-1/2">
      <h2 class="text-xl font-semibold mb-4">Create New Group</h2>
     <form action="{{ route('create.groupName') }}" method="POST">
      
        @csrf

    
        <div class="mb-4">
          <label for="groupNames" class="block text-gray-700 font-medium">Group Name</label>
          <input type="text" name="groupnames" id="groupnames" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="Enter group name">
        </div>
        <!-- Assign Roles
        <div class="mb-4">
          <label for="roles" class="block text-gray-700 font-medium">Assign Roles</label>
          <select id="roles" multiple class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            <option>Leader</option>
            <option>Member</option>
            <option>Observer</option>
          </select>
        </div> -->




        <!-- Buttons -->
        <div class="flex justify-end">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600" onclick="closeModal('createGroupModal')">Cancel</button>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
        </div>
      </form>
    </div>
    </div>

  <!-- Modal for Assigning Task -->
 

  <!-- Modal for Adding New Member -->
  


  <!-- JavaScript for Modal Functionality -->
  <script>

function openModal(modalId) {
      document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
      document.getElementById(modalId).classList.add('hidden');
    }

  </script>

</body>
</html>


@endsection
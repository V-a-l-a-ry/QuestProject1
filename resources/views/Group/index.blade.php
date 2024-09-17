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
<body class="bg-gray-100 gap-4">

@if (session('success'))
    <div class="bg-green-400 text-white p-4 rounded mt-4 mb-4 max-w-md mx-auto">
        {{ session('success') }}
    </div>
@endif


  <!-- Container -->
  <div class="container mx-auto p-4">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Group Management</h1>
      <!-- Button to open the "Create New Group" form -->
      <button onclick="openModal('createGroupModal')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New Group</button>
    </div>

    <!-- Groups List -->

    @foreach($groups as $group)
    <div class="bg-white mb-4 shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">GROUP</h2>
        <div class="divide-y  divide-gray-200">
            <div class="py-4 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-medium">{{ $group->name }}</h3>
                    <h3 class="text-lg font-medium">{{ $group->id }}</h3>
                    <p class="text-sm text-gray-600">5 Members</p>
                    <!-- Button to view group members -->
                    <button class="text-blue-500 hover:underline text-sm mt-2" onclick="openModal('viewMembersModal')">View Members</button>
                </div>
                <div class="flex space-x-2">
                    <!-- Button to assign a new task -->
                    <button onclick="openModal('assignTaskModal', {{ $group->id }})" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Assign New Task</button>

                    <!-- Button to add a new member -->
                    <button onclick="openModal('addMemberModal', {{ $group->id }})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Add Member</button>

                    <!-- Button to delete group -->
<form action="{{ route('destroy', $group->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this group?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
</form>

                </div>
            </div>
        </div>
    </div>
@endforeach

  </div>


  <!-- Modal for Creating New Group -->
  <div id="createGroupModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-1/2">
      <h2 class="text-xl font-semibold mb-4">Create New Group</h2>
     <form action="{{ route('create.group') }}" method="POST">
      
        @csrf
   
        <div class="mb-4">
          <label for="groupName" class="block text-gray-700 font-medium">Group Name</label>
          <input type="text" name="groupname" id="groupName" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="Enter group name">
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
  <div id="assignTaskModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-1/2">
      <h2 class="text-xl font-semibold mb-4">Assign Task to Group</h2>





  <form action="{{ route('assign.task') }}" method="POST">
        <!-- Task Description -->
        @csrf

      <div class="mb-4">
        <label for="group_id" class="block text-gray-700 font-medium">Group ID</label>
        <input type="text" id="group_id" name="group_id" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="" readonly>
      </div>

      <div class="mb-4">
          <label for="task" class="block text-gray-700 font-medium">Task</label>
          <input type="text" id="task" name="task" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="Enter group name">
        </div>


        <div class="mb-4">
          <label for="description" class="block text-gray-700 font-medium">Task-Description</label>
          <textarea id="description" name="description" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="Enter group name" ></textarea>
        </div>

        <div class="mb-4">
          <label for="date" class="block text-gray-700 font-medium">Due date</label>
          <input type="date" name="date" id="date" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="Enter group name">
        </div>

        
        <!-- Buttons -->
        <div class="flex justify-end">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600" onclick="closeModal('assignTaskModal')">Cancel</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Assign</button>
        </div>
      </form>
    </div>
  </div>







  <!-- Modal for Adding New Member -->
  <div id="addMemberModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-1/2">
      <h2 class="text-xl font-semibold mb-4">Add New Member</h2>




      <form action="{{ route('add.Togroup') }}" method="POST">
    @csrf
    
    <!-- Group ID -->
    <div class="mb-4">
        <label for="group_id2" class="block text-gray-700 font-medium">Group ID</label>
        <input type="text" id="group_id2" name="group_id2" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="" readonly>
    </div>

    <!-- Select Member Name -->
    <div class="mb-4">
        <label for="intern_id" class="block text-gray-700 font-medium">Select Member Name</label>
        <select id="intern_id" name="intern_id" class="w-full mb-16 border border-gray-300 rounded px-3 py-2 mt-1">
            @foreach($newIntern as $newInterns)
                <option value="{{ $newInterns->id }}">{{ $newInterns->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Intern ID (hidden or readonly) -->
 
    <!-- Buttons -->
    <div class="flex justify-end">
        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600" onclick="closeModal('addMemberModal')">Cancel</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Member</button>
    </div>
</form>








    </div>
  </div>

  <!-- Modal for Viewing Members -->
  <div id="viewMembersModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-1/2">
      <h2 class="text-xl font-semibold mb-4">Group Members</h2>
      <ul class="divide-y divide-gray-200 mb-4">
        <!-- Example Members List -->
        <li class="py-2 flex justify-between">
          <span>Member 1</span>
          <!-- Button to delete a member -->
          <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
        </li>
        <li class="py-2 flex justify-between">
          <span>Member 2</span>
          <!-- Button to delete a member -->
          <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
        </li>
        <!-- More members can be added here -->
      </ul>
      <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="closeModal('viewMembersModal')">Close</button>
    </div>
  </div>

  <!-- JavaScript for Modal Functionality -->
  <script>
    function openModal(modalId, groupId) {
    document.getElementById(modalId).classList.remove('hidden');

    // targets the input field with the static ID

    const groupInputField2 = document.getElementById('group_id2');
    const groupInputField = document.getElementById('group_id');


    if (groupInputField) {
      groupInputField.value = groupId; // Set the value to the passed groupId
    }

    if (groupInputField2) {
      groupInputField2.value = groupId; // Set the value to the passed groupId
    }
 
 





  }

    
    function closeModal(modalId) {
      document.getElementById(modalId).classList.add('hidden');
    }
  </script>

</body>
</html>


@endsection
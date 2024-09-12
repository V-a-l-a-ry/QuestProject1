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
<body class="bg-gray-100">

  <!-- Container -->
  <div class="container mx-auto p-4">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Group Management</h1>
      <!-- Button to open the "Create New Group" form -->
      <button onclick="openModal('createGroupModal')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New Group</button>
    </div>

    <!-- Groups List -->
    <div class="bg-white shadow-md rounded-lg p-6">
      <h2 class="text-xl font-semibold mb-4">Groups</h2>
      <div class="divide-y divide-gray-200">
        <!-- Example Group Item -->
        <div class="py-4 flex justify-between items-center">
          <div>
            <h3 class="text-lg font-medium">Group 1</h3>
            <p class="text-sm text-gray-600">5 Members</p>
            <!-- Button to view group members -->
            <button class="text-blue-500 hover:underline text-sm mt-2" onclick="openModal('viewMembersModal')">View Members</button>
          </div>
          <div class="flex space-x-2">
            <!-- Button to assign a new task -->
            <button onclick="openModal('assignTaskModal')" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Assign New Task</button>
            <!-- Button to add a new member -->
            <button onclick="openModal('addMemberModal')" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Add Member</button>
            <!-- Button to delete group -->
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
          </div>
        </div>
        <!-- Repeat similar block for each group -->
      </div>
    </div>
  </div>

  <!-- Modal for Creating New Group -->
  <div id="createGroupModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-1/2">
      <h2 class="text-xl font-semibold mb-4">Create New Group</h2>
     <form action="{{ route('create.group') }}" method="POST">
        <!-- Group Name -->

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
          <input type="datetime-local" name="date" id="date" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="Enter group name">
        </div>


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
      <form>
        <!-- Task Description -->
        <div class="mb-4">
          <label for="taskDescription" class="block text-gray-700 font-medium">Task Description</label>
          <textarea id="taskDescription" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" rows="4" placeholder="Enter task description"></textarea>
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
      <form>
        <!-- Member Name -->
        <div class="mb-4">
          <label for="memberName" class="block text-gray-700 font-medium">Member Name</label>
          <input type="text" id="memberName" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="Enter member name">
        </div>
        <!-- Assign Role -->
        <div class="mb-4">
          <label for="memberRole" class="block text-gray-700 font-medium">Assign Role</label>
          <select id="memberRole" class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            <option>Leader</option>
            <option>Member</option>
            <option>Observer</option>
          </select>
        </div>
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
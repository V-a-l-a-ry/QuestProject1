@extends('layouts.layout')

@section('content')

<div class="container mx-auto px-4 lg:px-8 mt-32">

    <!-- Group Assignment Section -->
    <div class="bg-red-100 shadow-md rounded-lg p-6 mb-8">

        @if($groupAssigned->isEmpty())
            <!-- If no records are found -->
            <p class="text-red-500">You are not assigned to any group yet.</p>
        @else
            <h3 class="text-xl font-semibold mb-4">Group you are assigned to:</h3>
            <ul class="list-disc pl-5">
                @foreach($groupAssigned as $assignment)
                    <li class=" mb-2">
                        <span class="text-lg font-bold text-gray-600">{{ $assignment->group->name }}</span></br>

                    </li>
                @endforeach
            </ul>
        @endif
    </div>







    <!-- Display Task Information -->
<div class="bg-white shadow-md rounded-lg p-6 mb-8">
    <h2 class="text-xl font-semibold mb-4">Group Tasks</h2>

    @if($tasks->isEmpty())
        <p class="text-gray-600 mb-4">No tasks assigned.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Task Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Due Date</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{ $task->title }}</td>
                        <td class="border px-4 py-2">{{ $task->description }}</td>
                        <td class="border px-4 py-2">{{ $task->due_date }}</td>
                 
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>


</div>

@endsection

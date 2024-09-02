@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <div class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 flex flex-col lg:flex hidden lg:block">
        <div class="flex items-center justify-center h-16 bg-gray-900 text-xl font-semibold">
            <a href="/">Quest</a>
        </div>
        <nav class="flex flex-col justify-between flex-grow mt-4">
            <div class="space-y-2">
                <ul>
                    <li class="px-4 py-3 hover:bg-gray-700"><a href="{{ url('/dashboard') }}" class="px-4 py-2 hover:bg-gray-700">Dashboard</a></li>
                    <li class="px-4 py-3 hover:bg-gray-700"><a href="{{ url('/profile') }}" class="px-4 py-2 hover:bg-gray-700">Profile</a></li>
                    <li class="px-4 py-3 hover:bg-gray-700"><a href="" class="px-4 py-2 hover:bg-gray-700">Nash</a></li>
                </ul>
            </div>
            <div class="mb-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 hover:bg-gray-700 text-white">
                        Logout
                    </button>
                </form>
            </div>
            
        </nav>
    </div>




    <div class="flex-grow lg:ml-64">
        <div class="container mx-auto px-4 py-8">
            <div>
                <div class="text-3xl font-bold text-center mb-4">Tasks</div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4 text-center border p-3 rounded-lg">
                        <p class="text-xl font-bold">Assigned Tasks</p>
                        <span>0</span>
                    </div>
    
                    <div class="col-span-4 text-center border p-3 rounded-lg">
                        <p class="text-xl font-bold">Completed Tasks</p>
                        <span>0</span>
                    </div>
    
                    <div class="col-span-4 text-center border p-3 rounded-lg">
                        <p class="text-xl font-bold">Pending Tasks</p>
                        <span>0</span>
                    </div>
                    
                </div>
            </div>

            <div class ="mt-5">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4 border p-3 rounded-lg">
                        <p class="text-center text-xl font-bold">Skill Developement</p>
                        <ul class="mt-2">
                            @foreach(is_array($user->skills) ? $user->skills : explode(',', $user->skills) as $skill)
                                <li>{{ trim($skill) }}</li>
                            @endforeach
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

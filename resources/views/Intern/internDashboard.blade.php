@extends('layouts.app')

@section('content')
    <div x-data="{ open: false }" class="flex bg-yellow-600 min-h-screen">
        <div :class="open ? 'block' : 'hidden'"
            class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 flex flex-col transition-all duration-300 ease-in-out">
            <div class="flex items-center justify-between h-16 bg-gray-900 text-xl font-semibold px-4">
                <a href="/">Admin One</a>
                <button @click="open = false" class="lg:hidden text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="flex flex-col justify-between flex-grow mt-4">
                <div class="space-y-2">
                    <ul>
                        <li class="px-4 py-3 hover:bg-gray-700"><a href="{{ url('/dashboard') }}"
                                class="px-4 py-2 block">Dashboard</a></li>
                        <li class="px-4 py-3 hover:bg-gray-700"><a href="{{ url('/profile') }}"
                                class="px-4 py-2 block">Profile</a></li>
                        <li class="px-4 py-3 hover:bg-gray-700"><a href="#" class="px-4 py-2 block">Nash</a></li>
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

        <div :class="open ? 'ml-64' : 'ml-0'" class="flex-grow transition-all duration-300 ease-in-out">

            <div class="container mx-auto py-8">
                <h2 class="text-2xl font-semibold text-gray-700">Profile</h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Edit Profile</h3>

                        @if (session('status'))
                            <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/profile') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="avatar">
                                    Avatar
                                </label>
                                <button class="bg-blue-500 text-white py-2 px-4 rounded-lg">Upload</button>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Name
                                </label>
                                <input id="name" type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    E-mail
                                </label>
                                <input id="email" type="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="email" value="{{ $user->email }}" required>
                            </div>

                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                                Submit
                            </button>
                        </form>
                    </div>

                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Profile</h3>
                        <div class="flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full bg-gray-300 text-center flex items-center justify-center">
                                <span class="text-gray-500">Avatar</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <p class="bg-gray-100 py-2 px-4 rounded">{{ $user->name }}</p>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                                <p class="bg-gray-100 py-2 px-4 rounded">{{ $user->email }}</p>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                                <p class="bg-gray-100 py-2 px-4 rounded">{{ $user->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Change Password</h3>
                    <form method="POST" action="{{ url('/profile/password') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="current_password">
                                Current Password
                            </label>
                            <input id="current_password" type="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="current_password" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password">
                                New Password
                            </label>
                            <input id="new_password" type="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="new_password" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password_confirmation">
                                Confirm Password
                            </label>
                            <input id="new_password_confirmation" type="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="new_password_confirmation" required>
                        </div>

                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

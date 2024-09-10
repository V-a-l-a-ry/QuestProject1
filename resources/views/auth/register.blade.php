@extends('layouts.layout')

@section('title', 'Register')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Register</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <!-- Full Name -->
        <div class="mb-4">
            <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="fullName" name="fullName" value="{{ old('fullName') }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Educational Level -->
        <div class="mb-4">
            <label for="educationalLevel" class="block text-sm font-medium text-gray-700">Educational Level</label>
            <select id="educationalLevel" name="educationalLevel" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="" disabled selected>Select your educational level</option>
                <option value="self_taught_developer" {{ old('educationalLevel') == 'self_taught' ? 'selected' : '' }}>Self-Taught Developer</option>
                <option value="high_school" {{ old('educationalLevel') == 'high_school' ? 'selected' : '' }}>High School Diploma</option>
                <option value="associate_degree" {{ old('educationalLevel') == 'associate_degree' ? 'selected' : '' }}>Associate Degree</option>
                <option value="bachelor_degree" {{ old('educationalLevel') == 'bachelor_degree' ? 'selected' : '' }}>Bachelor's Degree</option>
                <option value="master_degree" {{ old('educationalLevel') == 'master_degree' ? 'selected' : '' }}>Master's Degree</option>
                <option value="doctorate" {{ old('educationalLevel') == 'doctorate' ? 'selected' : '' }}>Doctorate</option>
            </select>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="intern" {{ old('role') == 'intern' ? 'selected' : '' }}>Intern</option>
            </select>
        </div>

        <!-- Bio Info -->
        <div class="mb-4">
            <label for="bioInfo" class="block text-sm font-medium text-gray-700">Bio Info (Age, Hobbies, Talents)</label>
            <textarea id="bioInfo" name="bioInfo[]" rows="4" placeholder="Enter age, hobbies, and talents"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('bioInfo') }}</textarea>
        </div>

        <!-- Skills -->
        <div class="mb-4">
            <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
            <select id="skills" name="skills[]" multiple required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @foreach (config('skills') as $skill)
                    <option class="py-2" value="{{ $skill }}" {{ in_array($skill, old('skills', [])) ? 'selected' : '' }}>
                        {{ $skill }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Register
            </button>
        </div>
    </form>
</div>
@endsection

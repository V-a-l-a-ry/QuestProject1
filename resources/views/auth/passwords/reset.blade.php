@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-full py-8">
    <div class="lg:w-1/3 md:w-1/2 w-full bg-white flex flex-col md:py-8 px-8 md:px-12 shadow-lg rounded-lg">
        <h2 class="text-gray-900 text-lg mb-4 font-medium title-font text-center">Reset Password</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email Address</label>
                <input id="email" type="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                <input id="password" type="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out @error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative mb-6">
                <label for="password-confirm" class="leading-7 text-sm text-gray-600">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out" required autocomplete="new-password">
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

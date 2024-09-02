@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 py-8">
    <div class="lg:w-1/3 md:w-1/2 w-full bg-white flex flex-col md:py-8 px-8 md:px-12 shadow-lg rounded-lg">
        <h2 class="text-gray-900 text-lg mb-4 font-medium title-font text-center">Reset Password</h2>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email Address</label>
                <input id="email" type="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full">
                    Send Password Reset Link
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

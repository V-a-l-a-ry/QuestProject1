@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-full py-8">
    <div class="lg:w-1/3 md:w-1/2 w-full bg-white flex flex-col md:py-8 px-8 md:px-12 shadow-lg rounded-lg">
        <h2 class="text-gray-900 text-lg mb-4 font-medium title-font text-center">Confirm Password</h2>

        <p class="leading-relaxed mb-5 text-gray-600 text-center">Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                <input id="password" type="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out @error('password') is-invalid @enderror" required autocomplete="current-password">
                @error('password')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-center mb-4">
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full">
                    Confirm Password
                </button>
            </div>

            @if (Route::has('password.request'))
                <div class="flex items-center justify-center">
                    <a class="text-sm text-indigo-500 hover:text-indigo-700" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection

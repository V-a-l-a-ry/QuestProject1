@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-full py-8">
    <div class="lg:w-1/3 md:w-1/2 w-full bg-white flex flex-col md:py-8 px-8 md:px-12 shadow-lg rounded-lg">
        <h2 class="text-gray-900 text-lg mb-4 font-medium title-font text-center">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email Address</label>
                <input id="email" type="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                <input id="password" type="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out @error('password') is-invalid @enderror" required autocomplete="current-password">
                @error('password')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-2 block text-sm leading-5 text-gray-900" for="remember">
                        Remember Me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-500 hover:text-indigo-700" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

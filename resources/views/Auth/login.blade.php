@extends('layout')

@section('title', 'Login')

@section('content')
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 mx-auto">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font mx-auto mb-5">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="relative mb-4">
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input type="email" id="email" name="email" value="{{ old('email') }}" />
                        <x-form-error name="email" />
                    </div>

                    <div class="relative mb-4">
                        <x-form-label for="password">Passwod</x-form-label>
                        <x-form-input type="password" id="password" name="password" />
                        <x-form-error name="password" />
                    </div>

                    <x-form-button>Login</x-form-button>
                    <p class="text-xs text-gray-500 mt-3">Not registered? <a href="{{ route('register') }}"
                            class="text-indigo-500">Register</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection

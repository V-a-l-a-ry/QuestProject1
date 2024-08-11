@extends('layout')

@section('title', 'Register')

@section('content')
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 mx-auto">

                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font mx-auto mb-5">Register</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="relative mb-4">
                        <x-form-label for="name">Name</x-form-label>
                        <x-form-input type="text" id="name" name="name" value="{{ old('name') }}" />
                        <x-form-error name="name" />
                    </div>

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

                    <div class="relative mb-4">
                        <x-form-label for="password_confirmation">Name</x-form-label>
                        <x-form-input type="password" id="password_confirmation" name="password_confirmation" />
                        <x-form-error name="password_confirmation" />
                    </div>

                    <x-form-button>Register</x-form-button>

                    <p class="text-xs text-gray-500 mt-3">Already registered? <a href="{{ route('login') }}"
                            class="text-indigo-500">Login</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection

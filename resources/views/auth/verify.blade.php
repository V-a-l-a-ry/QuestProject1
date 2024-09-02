@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-full py-8">
    <div class="lg:w-1/3 md:w-1/2 w-full bg-white flex flex-col md:py-8 px-8 md:px-12 shadow-lg rounded-lg">
        <h2 class="text-gray-900 text-lg mb-4 font-medium title-font text-center">Verify Your Email Address</h2>

        @if (session('resent'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                A fresh verification link has been sent to your email address.
            </div>
        @endif

        <p class="leading-relaxed text-gray-600 text-center mb-4">
            Before proceeding, please check your email for a verification link. If you did not receive the email,
        </p>

        <form method="POST" action="{{ route('verification.resend') }}" class="text-center">
            @csrf
            <button type="submit" class="text-indigo-500 hover:text-indigo-700 font-medium">
                click here to request another
            </button>.
        </form>
    </div>
</div>
@endsection

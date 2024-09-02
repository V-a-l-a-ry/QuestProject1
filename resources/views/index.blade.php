@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">

        <!-- Example of adding a button -->
        @if(auth()->check())
            <a href="{{ route('intern.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        @endif
</div>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<body style="margin: top; padding: 0; font-family: Arial, sans-serif; background-image: url('/images/backgrounds/quet.jpg'); background-size: cover; background-position: center;">


    <div class="flex">
        @include('Layouts.sidebar')

        <div class="ml-80 mt-16 w-full">
            <div>
                @include('Layouts.navbar')
            </div>
            <div class="h-[2000px]">
                <h1 class="text-2xl font-bold">@yield('heading')</h1>
            </div>
        </div>
    </div>
@endsection

<!--@section('heading', 'Welcome to the Home Page')-->

@extends('layout')

@section('title', 'Home')

@section('content')
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

@section('heading', 'Welcome to the Home Page')

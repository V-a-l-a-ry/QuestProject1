@extends('layout')

@section('title', 'Home')

@section('content')

    <div class="flex">
        @include('Layouts.sidebar')

        <div class="container mx-auto ">
            <div>
                @include('Layouts.navbar')
            </div>
        </div>
    @endsection

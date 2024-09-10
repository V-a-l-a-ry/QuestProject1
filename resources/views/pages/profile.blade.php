@extends('layouts.layout')

@section('title', 'profile')

@section('content')
    <div class="">
        <div class="relative h-[350px] bg-cover bg-center rounded-b-[50px] w-full" style="background-image: url('https://firebasestorage.googleapis.com/v0/b/portifolio-mathews.appspot.com/o/mohammad-rahmani-LrxSl4ZxoRs-unsplash.jpg?alt=media&token=7aec1f63-20a8-4114-b6b5-4d209007750e')">
            <div class="h-full rounded-b-[50px] bg-black opacity-70 "></div>
            <div class="absolute h-full top-0 flex justify-center px-6 text-white flex-col w-full">
                <h2 class="text-[28px] font-bold">Welcome to <span class="text-4xl text-brandColor">Bridge</span></h2>
                <p class="text-sm mt-2">Your one stop interns forum that shapes your future in tech. Learn, Do and Innovate.</p>
                <h3 class="text-xl text-brandColor font-semibold mt-2">Happy coding👩‍💻</h3>
            </div>
            <div class="absolute w-full bottom-0 flex justify-center items-center ">
                <img class="object-cover rounded-full absolute bottom--0 border-[4px] border-white h-36 w-36" src="https://firebasestorage.googleapis.com/v0/b/portifolio-mathews.appspot.com/o/people%2Fjimmy-fermin-bqe0J0b26RQ-unsplash.jpg?alt=media&token=ad9d2648-ef15-4a46-b7b9-3e3e23dc87dc"/> 
            </div>
        </div> 
    </div>
    @include('components.profile-info')
    @include('components.skills-section')
    @include('components.projects-section')
    @include('components.groups-section')
    
    
@endsection

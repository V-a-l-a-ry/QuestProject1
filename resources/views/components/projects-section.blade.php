@vite('resources/js/app.js')

<div class="relative flex flex-col px-6 h-max mt-4 " id="project-carousel">
    <h2 class=" mt-1 text-brandColor font-bold ">Your projects</h2>
    <div class="absolute inset-y-0 left-2 flex items-center">
        <button id="prev-project" class=" bg-brandColor text-white h-8 w-8 rounded-full shadow-md"><i class="fa-solid fa-chevron-left"></i></button>
    </div>
    <div class="flex overflow-x-auto no-scrollbar   gap-5">
        @foreach (config('projects.projects') as $project)
            @include('components.project', ['project' => $project])
        @endforeach
    </div>
    <div class=" w-full flex my-2  justify-center">

        <span id="project-counter" class="text-white w-16 py-1 rounded-lg text-center bg-green-800 font-bold text-xs">1/{{ count(config('projects.projects')) }}</span>
    </div>
    

    <div class="absolute inset-y-0 right-2 flex items-center">
        <button id="next-project" class="bg-brandColor text-white h-8 w-8 rounded-full shadow-md"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
</div>
<div class=" w-full   py-4 px-6 mb-4 h-max">
    <h2 class=" text-brandColor font-bold">Available projects</h2>
    <div class=" mt-2 flex flex-col gap-4">

        @foreach (config('projects.projects') as $project)
        <div class=" flex items-center justify-between gap-3 shadow-md bg-gray-100 px-2 w-full  py-1 ">
            <div>
                <h3 class=" font-bold">{{ $project['name']}}</h3>
                <p class=" text-xs">{{$project['description']}}</p>
            </div>
            <button class=" min-w-max text-white text-xs rounded-lg text-center bg-brandColor p-2"> request to join</button>
        </div>
        @endforeach
    </div>
</div>




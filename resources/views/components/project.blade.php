<div class=" min-w-full h-max rounded-xl overflow-hidden bg-gray-100  shadow-md my-2">
    <img class=" object-cover w-full h-40" src="{{$project['project_image']}}" alt="{{$project['name']}}"/>
    <div class=" p-2">
        <h2 class="font-bold ">{{$project['name']}}</h2>
        <p class=" truncate-multiline text-sm mt-2 ">{{$project['description']}}</p>
        <div class=" mt-2">
            <h3 class=" font-bold text-sm {{ $project['project_status'] ? 'text-brandColor' : 'text-red-600' }}">
              <span class="text-black mr-2"> project status :</span>  {{ $project['project_status'] ? 'Completed' : 'Ongoing' }}
            </h3>
        </div>
        <div>
            <a class=" flex gap-2 items-center py-2 text-brandColor" href="{{$project['github_link']}}">
                <i class="fa-brands fa-github text-gray-600 fa-xl"></i>
                Github repository
            </a>
        </div>
    </div>
</div>
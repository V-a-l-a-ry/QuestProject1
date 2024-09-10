<div class=" px-6 pt-20 pb-5 w-full h-max ">
        <div class=" relative h-max px-4 py-3 bg-gray-100 rounded-xl shadow-lg ">
            <h2 class=" text-lg font-bold">Your info</h2>
            <div class=" relative flex items-center ">
                <div class=" flex items-center gap-5 py-3 w-full">
                    <i class="fa-solid fa-user text-gray-600 fa-xl"></i>
                    <span class=" text-sm text-gray-600 capitalize">{{ Auth::user()->fullName }}</span>
                </div>
                
            </div>
            <div class=" relative flex items-center ">
                <div class=" flex items-center gap-5 py-3 w-full">
                    <i class="fa-solid fa-envelope text-gray-600 fa-xl"></i>
                    <span class=" text-sm text-gray-600 ">{{ Auth::user()->email }}</span>
                </div>
                
            </div>
            <div class=" relative flex items-center ">
                <div class=" flex items-center gap-5 py-3 w-full">
                    <i class="fa-solid fa-user-graduate text-gray-600 fa-xl"></i>
                    <span class=" text-sm text-gray-600 capitalize ">{{ str_replace('_', ' ', Auth::user()->educationalLevel) }}</span>
                </div>
            </div>
            <div class=" relative flex items-center ">
                <div class=" flex items-center gap-5 py-3 w-full">
                    <i class="fa-brands fa-github text-gray-600 fa-xl"></i>
                    <a href="https://github.com/mathewcyrus" class=" text-sm text-brandColor  capitalize ">github account</a>
                </div>
            </div>
            <div class=" relative flex items-center ">
                <div class=" flex items-center gap-5 py-3 w-full">
                    <i class="fa-solid fa-globe text-gray-600 fa-xl"></i>
                    <a href="https://github.com/mathewcyrus" class=" text-sm text-brandColor  capitalize ">portfolio website</a>
                </div>
            </div>

            <button class=" bg-brandColor py-3 text-center mt-4 w-full rounded-2xl text-white font-bold text-sm">
                Update your profile
            </button>
        </div>

    </div>
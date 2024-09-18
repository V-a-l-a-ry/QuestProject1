<nav class=" fixed z-50  top-0 w-full backdrop-blur-md  py-3 ">
    <div class="max-w-7xl px-6  sm:px-6 lg:px-8">
        <div class="flex justify-between h-12">
            <div class="flex ">
                <!-- Logo -->
                <div class="flex">
                    <a href="/" class="text-lg font-bold">
                        <img class=" h-10" src="https://cdn.questdesigners.com/app/uploads/2021/01/logo.png" srcset="https://cdn.questdesigners.com/app/uploads/2021/01/logo.png, https://cdn.questdesigners.com/app/uploads/2021/01/logo-retina.png 2x"/>

                    </a>
                </div>

                <!-- Links -->
                <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <a href="/about" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Notification</a>
                    <a href="/contact" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    <a href="{{ route('register.create') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                @else
                    <a href="#" class=" sm:hidden  w-max py-4 text-black hover:text-gray-700 px-3  rounded-md text-sm font-medium">{{ Auth::user()->fullName }}</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                    </form>
                @endguest
            </div>
            <div class=" flex justify-center items-center md:hidden">
                    <i class="fa-solid fa-bars text-brandColor fa-2xl"></i>
            </div>
            
        </div>
    </div>
</nav>

<header class="fixed top-0 left-0 w-full h-16 bg-gray-200 border-b border-gray-200 z-10">
    <div class="container-fluid mx-auto flex flex-wrap p-4 flex-col md:flex-row items-center">

        @auth
            <div class="relative flex items-center ml-auto group">
                <img src="https://img.icons8.com/?size=100&id=98957&format=png&color=000000" alt="User Avatar"
                    class="w-7 h-7 rounded-full mr-1">
                <button class="capitalize focus:outline-none" id="user-menu-button">
                    {{ Auth::user()->name }}
                </button>
                <div class="absolute right-0 mt-10 w-48 bg-white text-gray-800 rounded-md shadow-lg hidden group-hover:block"
                    id="user-menu">
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Settings</a>
                </div>
            </div>
        @else
            <div class="ml-auto">
                <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600">Login</a>
                <a href="{{ route('register') }}" class="ml-4 text-gray-800 hover:text-gray-600">Register</a>
            </div>
        @endauth

    </div>
</header>

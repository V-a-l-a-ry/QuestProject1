<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div x-data="{ open: false }" class="flex min-h-screen">
        <div :class="open ? 'block' : 'hidden lg:hidden'"
            class="w-64 bg-gray-800 text-white h-screen fixed top-0 left-0 flex flex-col transition-all duration-300 ease-in-out">
            <nav class="flex flex-col justify-between flex-grow mt-4">
                <div class="space-y-2">
                    <ul>
                        <li class="px-4 py-3 hover:bg-gray-700">
                            <a href="{{ url('/dashboard') }}"
                                class="flex items-center justify-between h-16 bg-gray-900 text-xl font-semibold px-4">Admin
                                One</a>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-700">
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 block">Dashboard</a>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-700">
                            <a href="{{ url('/profile') }}" class="px-4 py-2 block">Profile</a>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-700">
                            <a href="#" class="px-4 py-2 block">Nash</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 block">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-3 hover:bg-gray-700 text-white">
                                        Logout
                                    </button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="flex-grow transition-all duration-300" :class="open ? 'ml-64' : 'ml-0'">
            <nav class="bg-white shadow-sm p-5 fixed top-0 transition-all duration-300"
                :class="open ? 'left-64' : 'left-0 right-0'">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <button @click="open = !open" class="p-2 text-gray-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <a :class="open ? 'hidden lg:block' : ''" class="text-xl font-semibold text-gray-800"
                            href="{{ url('/') }}">
                            Quest
                        </a>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div :class="open ? 'hidden lg:flex' : 'flex'">
                            @guest
                                @if (Route::has('login'))
                                    <a class="text-gray-800 hover:text-blue-600" href="{{ route('login') }}">Login</a>
                                @endif
                                @if (Route::has('register'))
                                    <a class="text-gray-800 hover:text-blue-600" href="{{ route('register') }}">Register</a>
                                @endif
                            @else
                                <span>Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span></span>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>

            <div class="pt-16">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>

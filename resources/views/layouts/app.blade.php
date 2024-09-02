<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div>
        <nav class="bg-white shadow-sm p-5">
            <div class="container mx-auto flex justify-between items-center">
                <a class="text-xl font-semibold text-gray-800" href="{{ url('/') }}">
                    Quest
                </a>
                <div class="flex items-center space-x-2">
                    @guest
                        @if (Route::has('login'))
                            <a class="text-gray-800 hover:text-blue-600" href="{{ route('login') }}">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="text-gray-800 hover:text-blue-600" href="{{ route('register') }}">Register</a>
                        @endif
                    @else
                        <span>Welcome <span class="font-semibold">{{ Auth::user()->name }}</span>
                        
                    @endguest
                </div>
            </div>
        </nav>

        @yield('content')

    </div>
</body>
</html>

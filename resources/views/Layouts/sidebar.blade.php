<div class="w-80 h-screen bg-gray-800 flex flex-col">
    <!-- Logo and Branding -->
    <div class="p-4">
        <a class="flex items-center text-white mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl font-bold">Quest</span>
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex flex-col items-start text-base flex-grow p-5">
        <x-nav-link href="#" class="flex items-center text-white mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path
                    d="M 12 2.0996094 L 1 12 L 4 12 L 4 21 L 11 21 L 11 15 L 13 15 L 13 21 L 20 21 L 20 12 L 23 12 L 12 2.0996094 z M 12 4.7910156 L 18 10.191406 L 18 11 L 18 19 L 15 19 L 15 13 L 9 13 L 9 19 L 6 19 L 6 10.191406 L 12 4.7910156 z">
                </path>
            </svg>
            First Link
        </x-nav-link>
        <x-nav-link href="#" class="flex items-center text-white mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            Second Link
        </x-nav-link>
        <x-nav-link href="#" class="flex items-center text-white mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12l5 5L20 7"></path>
            </svg>
            Third Link
        </x-nav-link>
        <x-nav-link href="#" class="flex items-center text-white mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 4h16v16H4z"></path>
            </svg>
            Fourth Link
        </x-nav-link>
    </nav>

    <!-- Logout Button -->
    <div class="p-4 mt-auto">
        @auth
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="w-full text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    Logout
                </button>
            </form>
        @endauth
    </div>
</div>

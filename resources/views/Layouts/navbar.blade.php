<header class="text-gray-600 body-font w-full h-full border-b border-gray-200 fixed relative">
    <div class="container-fluid mx-auto flex flex-wrap p-4 flex-col md:flex-row items-center">

        <div class="relative flex items-center ml-auto group">
            <img src="https://img.icons8.com/?size=100&id=98957&format=png&color=000000" alt="User Avatar"
                class="w-7 h-7 rounded-full mr-1">
            <button class="capitalize focus:outline-none" id="user-menu-button">
                {{ Auth::user()->name }}
            </button>
            <div class="absolute right-0 mt-10 w-48 bg-white text-gray-800 rounded-md shadow-lg opacity-0 group-hover:opacity-100 group-hover:pointer-events-auto transition-opacity duration-300 hidden"
                id="user-menu">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Settings</a>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');

        userMenuButton.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    });
</script>

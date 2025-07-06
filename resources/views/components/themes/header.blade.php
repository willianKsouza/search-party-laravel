<header class="bg-white dark:bg-gray-900">
    <x-container>
        <nav class="flex justify-between items-center py-4">
            <a
                href="{{ route("pages.home") }}"
                class="flex items-center gap-2"
            >
                <img
                    src="{{ asset("img/space-invader-alien-black.png") }}"
                    alt="Logo"
                    class="size-[40px]"
                />
                <span class="text-orange-500 font-bold text-lg">
                    Search Party
                </span>
            </a>
            <ul class="flex justify-center items-center gap-4 text-white">
                <li>
                    <a href="{{ route("pages.home") }}" class="p-3">Home</a>
                </li>
                <li><a href="#" class="p-3">My Posts</a></li>
                <li>
                    <a href="{{ route("pages.profile") }}" class="p-3">
                        My Profile
                    </a>
                </li>
            </ul>
            <button>
                <a href="{{ route("auth.logout") }}" class="text-white">
                    Logout
                </a>
            </button>
        </nav>
    </x-container>
</header>

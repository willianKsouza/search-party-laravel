<header
    x-data="menuMobile"
    class="relative block lg:hidden bg-white dark:bg-gray-900"
>
    <x-container>
        <nav class="flex justify-between items-center py-4 h-[70px]">
            <div x-on:click="toggleMenu">
                <x-icons.menu-mobile class="text-primary" />
            </div>
            <div>
                <h2 class="font-bold text-primary">
                    Welcome, {{ auth()->user()->user_name }}
                </h2>
            </div>
            <div class="flex items-center gap-4">
                <div
                    x-data="notifications"
                    x-init="notificationListener({{ auth()->user()->id }})"
                    x-on:click="toggleMenu"
                    class="relative py-4 pl-2"
                >
                    <span
                        class="absolute text-red-500 text-2xl font-bold top-0 right-0"
                    >
                        !
                    </span>
                    <x-icons.notification class="text-primary" />
                    <x-modals.notifications />
                </div>
                <a
                    href="{{ route("pages.home") }}"
                    class="flex items-center gap-2"
                >
                    <img
                        src="{{ asset("img/logo.png") }}"
                        alt="Logo"
                        class="size-[30px] w-full"
                    />
                </a>
            </div>
            <div
                x-cloak
                x-transition
                x-show="open"
                class="absolute left-10 top-6 w-[150px] bg-primary p-4 rounded z-10"
            >
                <ul class="relative *:font-bold space-y-2 *:py-2">
                    <li class="flex justify-between items-center">
                        <a class="" href="{{ route("pages.home") }}">Home</a>
                        <x-icons.close
                            x-on:click="toggleMenu"
                            class="absolute size-[30px] -top-2 -right-2"
                        />
                    </li>
                    <li>
                        <a class="" href="{{ route("pages.post") }}">
                            My Posts
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route("pages.profile") }}">
                            My Profile
                        </a>
                    </li>
                    <li>
                        <button>
                            <a class="" href="{{ route("auth.logout") }}">
                                Logout
                            </a>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </x-container>
</header>

@php
    $showNewNotifications = auth()
        ->user()
        ?->unreadNotifications()
        ->where("type", "new_notification")
        ->whereNull("read_at")
        ->exists();
@endphp
<header class="hidden lg:block bg-white dark:bg-gray-900">
    <x-container>
        <nav class="flex justify-between items-center py-4 h-[70px]">
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
            <ul
                class="grow flex justify-center items-center gap-4 text-primary font-semibold text-lg *:hover:text-white"
            >
                <li>
                    <a
                        class="md:px-1 lg:px-2 py-4"
                        href="{{ route("pages.home") }}"
                    >
                        Home
                    </a>
                </li>
                <li>
                    <a
                        class="md:px-1 lg:px-2 py-4"
                        href="{{ route("pages.post") }}"
                    >
                        My Posts
                    </a>
                </li>
                <li>
                    <a
                        class="md:px-1 lg:px-2 py-4"
                        href="{{ route("pages.profile") }}"
                    >
                        My Profile
                    </a>
                </li>
            </ul>
            <div class="flex items-center gap-4 mr-2">
                <div
                    x-data="notifications"
                    x-init="notificationListener({{ auth()->user()->id }})"
                    x-on:click="toggleMenu"
                    class="relative py-4 pl-2"
                >
                    @if ($showNewNotifications)
                        <span
                            class="absolute text-red-500 text-2xl font-bold top-0 right-0"
                        >
                            !
                        </span>
                    @endif

                    <x-icons.notification class="text-primary" />
                    <x-modals.notifications />
                </div>
                <h2 class="font-bold text-primary">
                    Welcome, {{ auth()->user()->user_name }}
                </h2>
                <button>
                    <a
                        class="px-2 py-4 text-primary font-semibold hover:text-white"
                        href="{{ route("auth.logout") }}"
                    >
                        Logout
                    </a>
                </button>
            </div>
                <x-lang-switcher />
        </nav>
    </x-container>
    <div class="border-b border-primary/50"></div>
</header>

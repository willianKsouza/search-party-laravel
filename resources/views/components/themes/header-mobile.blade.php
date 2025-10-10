@php
    $showNewNotifications = auth()
        ->user()
        ?->unreadNotifications()
        ->where("type", "new_notification")
        ->whereNull("read_at")
        ->exists();
@endphp
<div class="sticky top-0 z-50">
    <header
        x-data="menuMobile"
        class="block lg:hidden bg-white dark:bg-gray-900"
    >
        <x-container>
            <nav
                class="flex flex-col-reverse sm:flex-row justify-between items-center gap-4 py-4"
            >
                <div
                    class="w-full flex justify-between sm:justify-normal items-center gap-4"
                >
                    <div x-on:click="toggleMenu">
                        <x-icons.menu-mobile class="text-primary" />
                    </div>
                    <div>
                        <h2 class="font-bold text-primary">
                            Welcome, {{ auth()->user()->user_name }}
                        </h2>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div
                        x-data="notifications"
                        x-init="notificationListener({{ auth()->user()->id }})"
                        x-on:click="toggleMenu"
                        class="hidden sm:flex items-center relative py-4 pl-2"
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
                    <a
                        href="{{ route("pages.home") }}"
                        class="flex items-center gap-2"
                    >
                        <img
                            src="{{ asset("img/logo.png") }}"
                            alt="Logo"
                            class="size-[40px] w-full object-contain"
                        />
                    </a>
                </div>
                <div
                    x-cloak
                    x-transition
                    x-show="open"
                    class="absolute w-1/2 h-screen top-0 left-0 bg-background-modal p-4 rounded z-10"
                >
                    <ul
                        class="relative *:font-bold space-y-2 *:py-2 *:text-primary"
                    >
                        <li class="flex justify-between items-center">
                            <a class="" href="{{ route("pages.home") }}">
                                Home
                            </a>
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
                            <a
                                class=""
                                href="{{ route("pages.notifications") }}"
                            >
                                Notifications
                            </a>
                        </li>
                        <li>
                            <button>
                                <a class="" href="{{ route("auth.logout") }}">
                                    Logout
                                </a>
                            </button>
                        </li>
                        <li>
                            <x-lang-switcher />
                        </li>
                    </ul>
                </div>
            </nav>
        </x-container>
    </header>
</div>

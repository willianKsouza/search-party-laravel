<div class="relative bg-white dark:bg-gray-900">
    <x-container>
        <div
            x-cloak
            x-transition
            x-show="showNotifications"
            class="absolute w-[350px] -right-15 top-6 bg-primary pt-4 rounded"
        >
            <div
                class="flex items-center justify-between h-[50px] px-4 border-b border-white"
            >
                <h2
                    class="text-white font-bold"
                    href="{{ route("pages.home") }}"
                >
                    Notifications
                </h2>
                <div class="text-white"></div>
                <div class="flex items-center gap-1">
                    <a
                        class="inline-block hover:bg-white/50 border border-black rounded-full px-2"
                        href="#"
                    >
                        Marcar todas
                    </a>
                    <x-icons.close
                        x-on:click.stop="toggleMenu"
                        class="size-[25px] text-white"
                    />
                </div>
            </div>
            <ul class="relative *:font-semibold space-y-2 *:py-2 pl-4 h-[300px] overflow-y-auto scrollbar-custom]">
                   <template
                    x-for="notification in notifications"
                    :key="notification.id"
                >
                    <li
                        class="border-b border-white"
                    >
                        <h2 class="whitespace-nowrap">
                            Voce tem novas mensagens no post:
                        </h2>
                        <h3 x-text="notification.post_title"></h3>
                        <a
                            class="inline-block hover:bg-white/50 border border-black rounded-full px-2 mt-2"
                            href="#"
                        >
                            Marcar como lida
                        </a>
                    </li>
                </template>
                @foreach ($notificationsFormated as $notication)
                    <li
                        class="{{ $loop->last ? "" : "border-b border-white" }}"
                    >
                        <h2 class="whitespace-nowrap">
                            Voce tem novas mensagens no post:
                        </h2>
                        <h3>{{ $notication["post_title"] }}</h3>
                        <a
                            class="inline-block hover:bg-white/50 border border-black rounded-full px-2 mt-2"
                            href="#"
                        >
                            Marcar como lida
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-container>
</div>

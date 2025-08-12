<div class="relative bg-white dark:bg-gray-900">
    <div
        x-cloak
        x-transition
        x-show="showNotifications"
        class="absolute sm:w-[350px] z-20 sm:-right-15 top-6 bg-background-modal border border-primary pt-4 rounded"
    >
        <div
            @click.stop
            class="flex items-center justify-between h-[50px] px-4 border-b border-primary"
        >
            <h2
                class="text-primary font-bold"
                href="{{ route("pages.home") }}"
            >
                Notifications
            </h2>
            <div class="text-white"></div>
            <div class="flex items-center gap-1">
                <form action="{{ route('notification.mark.all') }}" method="post">
                      @csrf
                    <button
                    type="submit"
                    class="inline-block hover:bg-white/50 border border-primary text-primary rounded-full px-2"
                    href="#"
                >
                    Marcar todas
                </button>
                </form>
                <x-icons.close
                    x-on:click.stop="toggleMenu"
                    class="size-[25px] text-primary"
                />
            </div>
        </div>
        <ul
            @click.stop
            class="relative *:font-semibold space-y-2 *:py-2 pl-4 h-[300px] overflow-y-auto scrollbar-custom"
        >
            <template
                x-for="notification in notifications"
                :key="notification.id"
            >
                <li class="*:text-primary">
                    <h2 class="whitespace-nowrap">
                        Você tem novas mensagens no post:
                    </h2>
                    <h3 x-text="notification.post_title"></h3>
                    <form x-bind:action="'{{ route('notification.mark', ['id' => 'id' ]) }}'.replace('id', notification.id)" method="post">
                        @csrf
                        <button
                        type="submit"
                            class="inline-block hover:bg-background-hover !text-white border border-primary rounded-full px-2 mt-2"
                            href="#"
                        >
                            Marcar como lida
                        </button>
                    </form>
                </li>
            </template>
            @foreach ($notificationsFormated as $notication)
                <li class="*:text-primary">
                    <h2 class="whitespace-nowrap">
                        Voce tem novas mensagens no post:
                    </h2>
                    <h3>{{ $notication["post_title"] }}</h3>
                    <form action="{{ route('notification.mark', ['id' => $notication["id"]]) }}" method="post">
                        @csrf
                        <button
                            type="submit"
                            class="inline-block hover:bg-background-hover !text-white border border-primary rounded-full px-2 mt-2"
                            href="#"
                        >
                            Marcar como lida
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>

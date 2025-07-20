<div class="relative bg-white dark:bg-gray-900">
    <x-container>
        <div
            x-cloak
            x-transition
            x-show="showNotifications"
            class="absolute w-[350px] -right-15 top-6 bg-primary p-4 rounded"
        >
            <div
                class="flex items-center justify-between h-[50px] border-b border-white"
            >
                <h2
                    class="text-white font-bold"
                    href="{{ route("pages.home") }}"
                >
                    Notifications
                </h2>

                <div class="flex items-center gap-1">
                    <a
                        class="inline-block hover:bg-white/50 border border-black rounded-full px-2 "
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
            <ul class="relative *:font-semibold space-y-2 *:py-2">
                @foreach (range(1, 5) as $notication)
                    <li class="{{ $loop->last ? '' : 'border-b border-white'}}">
                        <h2 class="whitespace-nowrap">
                            Voce tem novas mensagens no grupo:
                        </h2>
                        <h3>grupo para jogar phantasy star online</h3>
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

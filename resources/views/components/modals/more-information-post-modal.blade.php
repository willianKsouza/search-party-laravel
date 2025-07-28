<div
    x-cloak
    x-show="post.showPostModal"
    x-transition
    x-on:click="closePostModal"
    class="fixed inset-0 h-screen bg-black/60"
>
    <x-container>
        <div
            x-show="!post.warning"
            class="h-screen flex justify-center items-center"
        >
            <div
                x-on:click.stop
                x-transition
                class="bg-white dark:bg-background rounded-lg shadow-lg w-[90%] md:w-[70%] h-[500px] flex flex-col pt-6 border border-primary/40"
            >
                <div class="w-full px-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2
                            x-text="post.data.title"
                            class="col-span-10 text-xl font-semibold text-primary"
                        ></h2>
                        <button
                            x-on:click="closePostModal"
                            class="justify-self-end col-span-1 size-[30px] py-1 border border-primary/40 hover:bg-background-hover rounded-md text-primary hover:text-white flex justify-center items-center"
                        >
                            X
                        </button>
                    </div>
                    <p
                        x-text="post.data.body"
                        class="text-gray-700 dark:text-gray-300"
                    ></p>
                </div>
                <div class="px-6 py-2 flex items-center justify-between">
                    <x-breadcrumbs class="flex items-center gap-2">
                        <template
                            x-for="category in post.data.categories"
                            :key="category.id + '-' + category.name"
                        >
                            <x-breadcrumbs
                                x-text="category.name"
                                class="px-2 rounded-2xl border border-primary/40 text-primary hover:bg-background-hover hover:text-white"
                            ></x-breadcrumbs>
                        </template>
                    </x-breadcrumbs>
                    <span class="col-start-auto flex items-center gap-x-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="text-primary"
                        >
                            <path
                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                            />
                            <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <circle cx="9" cy="7" r="4" />
                        </svg>
                        <span
                            class="text-white"
                            x-text="post.data.participants.length"
                        ></span>
                    </span>
                </div>
                <div class="grid grid-cols-12 flex-1 overflow-hidden">
                    <div
                        class="border-t border-r border-primary/40 col-span-10 h-full overflow-y-hidden scrollbar-custom flex gap-4 flex-col pl-4 pb-4"
                    >
                        <div
                            class="flex-1 overflow-y-auto px-4"
                            x-data="{
                                currentUserId: {{ auth()->user()->id }},
                                scrollToBottom() {
                                    this.$nextTick(() => {
                                        this.$refs.messagesEnd.scrollIntoView({ behavior: 'auto' })
                                    })
                                },
                                observer() {
                                    this.scrollToBottom()
                                    this.$watch('post.data.messages.length', () => {
                                        this.scrollToBottom()
                                    })
                                },
                            }"
                            x-init="observer"
                        >
                            <div class="flex flex-col gap-2">
                                <template x-if="post?.data?.messages">
                                    <template
                                        x-for="message in post.data.messages"
                                        :key="message.id"
                                    >
                                        <div
                                            class="flex"
                                            :class="message.user_id === currentUserId ? 'justify-end' : 'justify-start'"
                                        >
                                            <div
                                                class="max-w-xs px-4 py-2 rounded-lg"
                                                :class="message.user_id === currentUserId ? 'bg-orange-500/70 text-white' : 'bg-gray-200 border border-primary/40/10 text-gray-900'"
                                            >
                                                <span
                                                    x-text="message.message"
                                                ></span>
                                            </div>
                                        </div>
                                    </template>
                                </template>
                                <div x-ref="messagesEnd"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex gap-x-2 pr-4">
                                <input
                                    x-on:keyup.enter="sendMessage({{ auth()->user()->id }})"
                                    x-model="post.data.message"
                                    type="text"
                                    placeholder="Digite sua mensagem..."
                                    class="text-primary flex-1 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-primary bg-gray-900 border border-primary/40"
                                />
                                <button
                                    x-on:click="sendMessage({{ auth()->user()->id }})"
                                    class="flex justify-center items-center px-4 py-2 rounded text-primary hover:text-white border border-primary/40 hover:bg-background-hover"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-send-icon lucide-send"
                                    >
                                        <path
                                            d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"
                                        />
                                        <path d="m21.854 2.147-10.94 10.939" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Lista de usuários -->
                    <div
                        class="border-t border-primary/40 col-span-2 overflow-y-auto scrollbar-custom h-full"
                    >
                        <ul class="w-full text-end">
                            <template
                                x-for="participant in post.data.participants"
                                :key="participant.id"
                            >
                                <li
                                    x-text="participant.user_name"
                                    class="text-primary py-0.5 hover:bg-background-hover px-2"
                                ></li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div
            x-show="post.warning"
            class="mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg w-[90%] md:w-[70%] h-[500px] flex justify-center items-center"
        >
            <h2 class="text-white">Ocorreu um erro</h2>
        </div>
    </x-container>
</div>

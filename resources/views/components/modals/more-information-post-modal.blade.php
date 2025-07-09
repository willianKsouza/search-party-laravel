<div
    x-cloak
    x-show="post.showPostModal"
    x-transition
    x-on:click="closePostModal"
    class="absolute inset-0 flex flex-col justify-center h-screen bg-black/60"
>
    <div x-show="!post.warning">
        <div
            x-on:click.stop
            x-transition
            class="mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg w-[90%] md:w-[70%] h-[500px] flex flex-col py-6"
        >
            <div class="w-full relative px-6">
                <h2
                    x-text="post.data.title"
                    class="text-xl font-semibold mb-4"
                ></h2>
                <button
                    x-on:click="closePostModal"
                    class="absolute right-6 top-0 w-[50px] py-1 border border-red-700 hover:bg-red-900 rounded-md text-white"
                >
                    X
                </button>
                <p
                    x-text="post.data.body"
                    class="mb-4 text-gray-700 dark:text-gray-300"
                ></p>
            </div>
            <div class="grid grid-cols-12 flex-1 overflow-hidden pl-6">
                <div class="col-span-10 h-full overflow-y-hidden flex flex-col">
                    <div
                        class="flex-1 overflow-y-auto px-4 py-2"
                        x-data="{
                            currentUserId: {{ auth()->user()->id }},
                            scrollToBottom() {
                                this.$nextTick(() => {
                                    this.$refs.messagesEnd.scrollIntoView({ behavior: 'auto' })
                                })
                            },
                            init() {
                                this.scrollToBottom()
                                this.$watch('post.data.messages.length', () => {
                                    this.scrollToBottom()
                                })
                            },
                        }"
                        x-init="init"
                    >
                        <div class="flex flex-col overflow-y-auto space-y-2">
                            <template
                                x-for="message in post.data.messages"
                                :key="message.created_at"
                            >
                                <div
                                    class="flex"
                                    :class="message.user_id === currentUserId ? 'justify-end' : 'justify-start'"
                                >
                                    <div
                                        class="max-w-xs px-4 py-2 rounded-lg"
                                        :class="message.user_id === currentUserId ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-900'"
                                    >
                                        <span
                                            x-text="message.message"
                                        ></span>
                                    </div>
                                </div>
                            </template>
                            <div x-ref="messagesEnd"></div>
                        </div>
                    </div>
                    <div class="border-t px-4 py-3 bg-gray-900">
                        <div class="flex space-x-2">
                            <input
                                x-on:keyup.enter="sendMessage({{ auth()->user()->id }})"
                                x-model="post.data.message"
                                type="text"
                                placeholder="Digite sua mensagem..."
                                class="flex-1 px-4 py-2 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-900 text-gray-100"
                            />
                            <button
                                x-on:click="sendMessage({{ auth()->user()->id }})"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                            >
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lista de usuários -->
                <div class="col-span-2 overflow-y-auto h-full">
                    <ul class="text-end">
                        @foreach (range(1, 20) as $user)
                            <li>{{ $user }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de erro -->
    <div
        x-show="post.warning"
        class="mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg w-[90%] md:w-[70%] h-[500px] flex justify-center items-center"
    >
        <h2 class="text-white">Ocorreu um erro</h2>
    </div>
</div>

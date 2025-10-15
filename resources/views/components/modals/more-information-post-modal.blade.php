<div
    x-cloak
    x-show="post.showPostModal"
    x-transition
    x-on:click="closePostModal"
    class="fixed inset-0 h-screen bg-black/50 z-50"
>
    <x-container>
        <div
            x-data="chat()"
            x-show="!post.warning"
            class="h-screen flex justify-center items-center"
        >
            <div
                x-on:click.stop
                x-transition
                class="relative w-2xl dark:bg-background-modal rounded-lg shadow-lg h-[500px] flex flex-col pt-6 border border-primary/40 overflow-x-auto"
            >
                <div class="w-full px-4 sm:px-6">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h2
                                x-text="post.data.title"
                                x-show="!post.edit"
                                class="col-span-10 sm:text-xl font-semibold text-primary"
                            ></h2>
                            <x-form x-show="post.edit">
                                @csrf
                                <x-form.input
                                    data-title="title"
                                    x-bind:value="post.data.title"
                                    x-on:change="updatePost"
                                    type="text"
                                ></x-form.input>
                            </x-form>
                        </div>
                        <div class="flex items-center gap-4">
                            <button
                                x-on:click="closePostModal"
                                class="justify-self-end col-span-1 size-[30px] py-1 border border-primary/40 hover:bg-background-hover rounded-md text-primary hover:text-white flex justify-center items-center"
                            >
                                X
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 flex justify-between items-center">
                        <div>
                            <button
                                x-on:click="toggleDescription"
                                class="text-xs text-primary/70 hover:text-primary flex items-center gap-1"
                            >
                                <span>
                                    {{ __("components.more_information_post_modal.labels.description") }}
                                </span>
                                <x-icons.arrow
                                    class="w-3 h-3 transition-transform"
                                    x-bind:class="showDescription ? 'rotate-180' : ''"
                                />
                            </button>
                            <p
                                x-show="showDescription"
                                x-transition
                                x-text="post.data.body"
                                class="text-sm text-gray-700 dark:text-gray-300 mt-2 p-2 rounded"
                            ></p>
                            <x-form x-show="post.edit">
                                @csrf
                                <x-form.input
                                    data-body="body"
                                    x-bind:value="post.data.body"
                                    x-on:change="updatePost"
                                    type="text"
                                ></x-form.input>
                            </x-form>
                        </div>
                        <div>
                            <span
                                x-on:click="toggleParticipants"
                                class="relative flex items-center gap-x-2"
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
                            <div
                                x-show="showParticipants"
                                x-transition
                                class="absolute right-2 top-29 md:top-25 bg-white dark:bg-background-modal border border-primary/40 rounded-lg shadow-lg w-48 max-h-60 overflow-y-auto z-20 p-2"
                            >
                                <ul class="w-full">
                                    <template
                                        x-for="participant in post.data.participants"
                                        :key="participant.id"
                                    >
                                        <div
                                            class="relative flex items-center justify-end"
                                        >
                                            <template
                                                x-if="participant.id === {{ auth()->user()->id }}"
                                            >
                                                <form
                                                    x-bind:action="'{{ route("post.exit", ["id" => "id"]) }}'.replace('id', post.postId)"
                                                    method="post"
                                                >
                                                    @csrf
                                                    <button
                                                        x-on:click="exitChatPost"
                                                        class="absolute left-2 top-0.5 py-0.5 px-2 border border-red-500 rounded-md text-red-500 hover:bg-red-500 hover:text-white"
                                                    >
                                                        {{ __("components.more_information_post_modal.buttons.leave") }}
                                                    </button>
                                                </form>
                                            </template>
                                            <li
                                                x-text="participant.user_name"
                                                class="text-primary py-0.5 hover:bg-background-hover px-2"
                                            ></li>
                                        </div>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="px-4 sm:px-6 py-2 flex flex-wrap items-center justify-between gap-y-4"
                >
                    <x-breadcrumbs mobile>
                        <template
                            x-for="category in post.data.categories"
                            :key="category.name + category.id"
                        >
                            <x-breadcrumbs.item
                                x-text="category.name"
                            ></x-breadcrumbs.item>
                        </template>
                    </x-breadcrumbs>
                    <template
                        x-if="post.userPostId === {{ auth()->user()->id }}"
                    >
                        <div
                            x-show="!post.showDeletePostDialog"
                            class="w-full flex justify-end gap-4"
                        >
                            <x-form.button
                                class="border-red-700 hover:bg-red-900 text-red-500 hover:text-white"
                                x-on:click="showDeletePostDialog"
                            >
                                Destroy
                            </x-form.button>
                            <x-form.button
                                x-bind:class="post.edit ? 'bg-background-hover' : ''"
                                x-on:click="changeEditState"
                            >
                                Edit
                            </x-form.button>
                        </div>
                    </template>
                    <div
                        x-show="post.showDeletePostDialog"
                        class="w-full flex flex-col justify-center gap-4"
                    >
                        <h2 class="text-primary">
                            Você tem certeza que deseja deletar esse post?
                        </h2>
                        <x-form
                            class="flex gap-4"
                            x-bind:action="'{{ route('post.destroy', ['id' => 'id']) }}'.replace('id', post.postId)"
                            method="post"
                        >
                            @method("DELETE")
                            @csrf
                            <x-form.button type="submit">Confirm</x-form.button>
                            <x-form.button x-on:click="showDeletePostDialog">
                                Cancel
                            </x-form.button>
                        </x-form>
                    </div>
                </div>
                <div class="flex-1 overflow-hidden">
                    <div
                        class="border-t border-r border-primary/40 h-full overflow-y-hidden scrollbar-custom flex gap-4 flex-col pl-2 sm:pl-4 pb-4"
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
                                <template x-if="post.data.messages">
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
                                                :class="message.user_id === currentUserId ? 'bg-orange-500/70 text-white' :
                                                    'bg-gray-200 border border-primary/40/10 text-gray-900'"
                                            >
                                                <ul>
                                                    <li
                                                        class="text-xs italic text-black/60 font-bold flex justify-between gap-4"
                                                    >
                                                        <span
                                                            x-text="message.user?.user_name ?? 'User'"
                                                        ></span>
                                                        <span
                                                            x-text="formatDate(message.created_at)"
                                                        ></span>
                                                    </li>
                                                    <li
                                                        x-text="message.message"
                                                    ></li>
                                                </ul>
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
                                    placeholder="{{ __("components.more_information_post_modal.placeholder") }}"
                                    class="text-primary grow px-1 sm:px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-primary bg-gray-900 border border-primary/40"
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
                </div>
            </div>
        </div>
        <div
            x-show="post.warning"
            class="mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg w-[90%] md:w-[70%] h-[500px] flex justify-center items-center"
        >
            <h2 class="text-white">
                {{ __("components.more_information_post_modal.error_message") }}
            </h2>
        </div>
    </x-container>
</div>

<div
    x-cloak
    x-show="post.showNewPostModal"
    x-transition
    x-on:click="toggleNewPostModal"
    class="absolute inset-0 flex items-center justify-center h-screen bg-black/60 z-50"
>
    <div
        x-on:click.stop
        x-transition
        class="bg-white dark:bg-background-modal rounded-lg shadow-lg w-[90%] md:w-[70%] max-h-[90%] flex flex-col p-6 overflow-y-auto"
    >
        <h2 class="text-xl font-semibold mb-4 text-primary">
            {{ __('components.new_post_modal.title') }}
        </h2>
        <form class="space-y-6">
            @csrf
            <div>
                <x-form.label for="title">
                    {{ __('components.new_post_modal.labels.title') }}
                </x-form.label>
                <x-form.input
                    x-model="post.data.title"
                    type="text"
                    id="title"
                    name="title"
                    placeholder="Enter the post title"
                    required
                />
                <div>
                    <x-form.error
                        x-show="post.errors.title"
                        x-text="post.errors.title"
                    />
                </div>
            </div>
            <div>
                <x-form.label for="body">
                    {{ __('components.new_post_modal.labels.description') }}
                </x-form.label>
                <x-form.text-area
                    x-model="post.data.body"
                    id="body"
                    name="body"
                    placeholder="Enter the post description"
                    rows="4"
                    required
                ></x-form.text-area>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-200 mb-2">
                        {{ __('components.new_post_modal.labels.categories') }}
                </label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($categories as $category)
                        <x-form.label
                            class="flex items-center space-x-2 border border-primary/40  px-0.5 py-2 rounded"
                        >
                            <input
                                x-model="post.data.categories_id"
                                type="checkbox"
                                name="categories[]"
                                value="{{ $category->id }}"
                                class="rounded text-primary focus:ring-primary"
                            />
                            <span class="text-primary text-xs md:text-sm">
                                {{ $category->name }}
                            </span>
                        </x-form.label>
                    @endforeach
                </div>
            </div>
            <div>
                <x-form.error
                    x-show="post.errors.categories"
                    x-text="post.errors.categories"
                />
            </div>
            <div class="flex justify-end gap-x-2 mt-4">
                <x-form.button x-on:click.prevent="createPost()" type="submit">
                    {{ __('components.new_post_modal.buttons.create') }}
                </x-form.button>
                <button
                    type="button"
                    x-on:click="toggleNewPostModal"
                    class="px-4 py-2 border border-red-700 hover:bg-red-900 rounded-md text-red-500 hover:text-white"
                >
                    {{ __('components.new_post_modal.buttons.cancel') }}
                </button>
            </div>
        </form>
    </div>
</div>

<div
    x-cloak
    x-show="post.showNewPostModal"
    x-transition
    x-on:click="toggleNewPostModal"
    class="absolute inset-0 flex items-center justify-center h-screen bg-black/60"
>
    <div
        x-on:click.stop
        x-transition
        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-[90%] md:w-[70%] max-h-[90%] flex flex-col p-6 overflow-y-auto"
    >
        <h2 class="text-xl font-semibold mb-4">Novo Post</h2>
        <form class="space-y-4">
            @csrf
            <div>
                <label
                    for="title"
                    class="block text-sm font-medium text-gray-200 mb-1"
                >
                    Título
                </label>
                <input
                    x-model="post.data.title"
                    type="text"
                    id="title"
                    name="title"
                    placeholder="Digite o título do post"
                    class="w-full px-4 py-2 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-900 text-gray-100"
                    required
                />
                <div>
                    <p x-show="post.errors.title" x-text="post.errors.title"></p>
                </div>
            </div>
            <div>
                <label
                    for="body"
                    class="block text-sm font-medium text-gray-200 mb-1"
                >
                    Descrição
                </label>
                <textarea
                    x-model="post.data.body"
                    id="body"
                    name="body"
                    placeholder="Digite a descrição do post"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-900 text-gray-100"
                    required
                ></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-200 mb-2">
                    Categorias
                </label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($categories as $category)
                        <label
                            class="flex items-center space-x-2 bg-gray-700 px-3 py-2 rounded"
                        >
                            <input
                                //TODO parece que o modal esta usando os mesmos dados em alguma lugar, estao conflitando
                                x-model="post.data.categories"
                                type="checkbox"
                                name="categories[]"
                                value="{{ $category->id }}"
                                class="rounded text-blue-600 focus:ring-blue-500"
                            />
                            <span class="text-gray-100">
                                {{ $category->name }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-end gap-x-2 mt-4">
                <button
                    x-on:click.prevent="createPost()"
                    type="submit"
                    class="px-4 py-2 border border-orange-700 hover:bg-orange-900 rounded text-orange-500"
                >
                    Criar
                </button>
                <button
                    type="button"
                    x-on:click="toggleNewPostModal"
                    class="px-4 py-2 border border-red-700 hover:bg-red-900 rounded text-red-500"
                >
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

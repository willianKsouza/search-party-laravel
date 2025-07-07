@extends("layouts.default")
@section("content")
    <section x-data="post()">
        <x-container>
            @if (session("status"))
                <div class="text-xs text-green-500 mt-1">
                    {{ session("status") }}
                </div>
            @endif

            <section class="mt-8 grid grid-cols-12 gap-4">
                <form
                    action=""
                    method="get"
                    class="col-span-12 md:col-span-10 flex items-center gap-4"
                >
                    <input
                        type="text"
                        name="q"
                        placeholder="Buscar..."
                        class="flex-1 px-4 py-3 border-2 border-orange-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors duration-200"
                    />
                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center gap-2"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            ></path>
                        </svg>
                        Buscar
                    </button>
                </form>
                <div class="col-span-12 md:col-span-2 flex justify-end">
                    <button
                        x-on:click="toggleNewPostModal"
                        type="button"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200 flex justify-center items-center gap-2"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>
                        Novo Post
                    </button>
                </div>
            </section>
            <section>
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8"
                >
                    @foreach ($posts as $key => $post)
                        <div
                            class="relative bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4"
                        >
                            <div>
                                <h2
                                    class="text-lg font-semibold text-gray-900 dark:text-orange-500"
                                >
                                    {{ $post->title }}
                                </h2>
                                <span
                                    class="absolute top-1 right-1 flex justify-center items-center rounded-full bg-red-700 text-white size-6 rotate-12"
                                >
                                    {{ $key }}
                                </span>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">
                                {{ $post->body }}
                            </p>
                            <div class="mt-4 flex justify-between">
                                <button
                                    x-on:click="togglePostModal"
                                    class="w-[100px] py-1 border border-amber-700 hover:bg-amber-900 rounded-md text-amber-700"
                                >
                                    Ver mais
                                </button>
                                @can("view", $post)
                                    <button
                                        class="w-[100px] py-1 border border-red-700 hover:bg-red-900 rounded-md text-white"
                                    >
                                        excluir
                                    </button>
                                @endcan
                            </div>
                        </div>
                    @endforeach

                    <x-modals.more-information-post-modal />
                    <x-modals.new-post-modal />
                </div>
            </section>
        </x-container>
    </section>
@endsection

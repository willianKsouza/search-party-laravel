@extends("layouts.default")
@section("content")
    <section x-data="post()">
        <x-container>
            <section
                x-data="filters"
                class="flex justify-between gap-4 mt-6"
            >
                <x-form method="GET" class="grow flex items-center">
                    @csrf
                    <div
                        class="w-full flex border border-primary rounded-md focus-within:border-border transition-colors duration-200 overflow-hidden"
                    >
                        <input
                            x-model="search"
                            x-on:keyup.prevent.enter="searchByTitle"
                            type="text"
                            name="search"
                            class="w-full pl-2 focus:outline-none text-primary"
                            value="{{ $search }}"
                        />
                        <button
                            x-on:click.prevent="searchByTitle"
                            type="submit"
                            class="flex justify-center items-center px-4 py-3 text-white bg-primary hover:bg-background-hover"
                        >
                            <x-icons.search />
                        </button>
                    </div>
                </x-form>
                <x-form.button
                    x-on:click="toggleNewPostModal"
                    class="flex gap-2 whitespace-nowrap"
                >
                    <x-icons.plus />
                    Novo Post
                </x-form.button>
            </section>
            <section class="py-4">
                <x-breadcrumbs x-data="filters">
                    <x-breadcrumbs.item
                        x-on:click="clearAllFilters"
                        class="px-4"
                    >
                        All
                    </x-breadcrumbs.item>
                    @foreach ($categories as $category)
                        <x-breadcrumbs.item
                            x-on:click="categoryFilter('{{ $category->slug }}')"
                        >
                            {{ $category->name }}
                        </x-breadcrumbs.item>
                    @endforeach
                </x-breadcrumbs>
            </section>
            <section>
                <div
                    class="grid items-start grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
                >
                    @if ($posts->count())
                        @foreach ($posts as $key => $post)
                            <div
                                class="relative bg-white dark:bg-background rounded-lg shadow-lg p-4 flex flex-col justify-between"
                            >
                                <div>
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
                                    <p
                                        class="text-gray-700 dark:text-gray-300 mt-2"
                                    >
                                        {{ $post->body }}
                                    </p>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <button
                                        x-on:click="openPostModal({{ $post->id }})"
                                        class="w-[100px] py-1 border border-amber-700 hover:bg-amber-900 rounded-md text-amber-700"
                                    >
                                        Ver mais
                                    </button>
                                    @can("view", $post)
                                        <form
                                            method="POST"
                                            action="{{ route("post.delete", ["id" => $post->id]) }}"
                                        >
                                            @method("DELETE")
                                            @csrf
                                            <button
                                                type="submit"
                                                class="w-[100px] py-1 border border-red-700 hover:bg-red-900 rounded-md text-white"
                                            >
                                                excluir
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{--
                        <div class="mt-4">
                        {{ $posts->appends(["q" => $search])->links() }}
                        </div>
                    --}}
                    {{--
                        @foreach (range(1,60) as $post)
                        <div class="bg-primary p-4">
                        <p>{{ $post }}</p>
                        <p>{{ $post }}</p>
                        <p>{{ $post }}</p>
                        </div>
                        @endforeach
                    --}}
                    <x-modals.more-information-post-modal />
                    <x-modals.new-post-modal />
                </div>
            </section>
        </x-container>
    </section>
@endsection

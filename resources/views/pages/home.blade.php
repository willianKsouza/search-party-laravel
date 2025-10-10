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
                        class="w-full flex border border-primary/40 rounded-md focus-within:border-primary/40 transition-colors duration-200 overflow-hidden"
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
                    {{  __("pages.home.add_post") }}
                </x-form.button>
            </section>
            <section x-data="filters" class="py-4">
                <div class="space-y-4
                ">
                    <button
                        x-on:click="toggleCategories"
                        class="text-xs text-primary/70 hover:text-primary flex items-center gap-1"
                    >
                        <span>{{ __("pages.home.view_categories") }}</span>
                        <x-icons.arrow
                            class="w-3 h-3 transition-transform"
                            x-bind:class="showCategories ? 'rotate-180' : ''"
                        />
                    </button>
                    <div x-show="showCategories" x-transition>
                        <x-breadcrumbs >
                        <x-breadcrumbs.item
                            x-on:click="updateOrClearUrl('')"
                            class="px-4"
                        >
                            All
                        </x-breadcrumbs.item>
                        @foreach ($categories as $category)
                            <x-breadcrumbs.item
                                class="{{ isset($array_slugs) && in_array($category->slug, $array_slugs) ? 'bg-background-hover' : '' }}"
                                x-on:click="categoryFilter('{{ $category->slug }}')"
                            >
                                {{ $category->name }}
                            </x-breadcrumbs.item>
                        @endforeach
                    </x-breadcrumbs>
                    </div>
                </div>
            </section>
            <section>
                <div
                    class="grid items-start grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
                >
                    @if ($posts->count())
                        @foreach ($posts as $key => $post)
                            <x-card-post :post="$post" />
                        @endforeach
                    @endif

                    <x-modals.more-information-post-modal />
                    <x-modals.new-post-modal />
                </div>
                <div class="py-4">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
            </section>
        </x-container>
    </section>
@endsection

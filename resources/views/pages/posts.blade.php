@extends("layouts.default")

@section("content")
    <x-container x-data="post()">
        <h1 class="text-2xl font-bold text-center text-orange-500">My Posts</h1>

          <section class="py-4">
                <x-breadcrumbs x-data="filters">
                    <x-breadcrumbs.item x-on:click="updateOrClearUrl('')" class="px-4">
                        All
                    </x-breadcrumbs.item>
                    @foreach ($categories as $category)
                        <x-breadcrumbs.item
                            class="{{ isset($array_slugs) && in_array($category->slug, $array_slugs) ? 'bg-background-hover' : '' }}"
                            x-on:click="categoryFilter('{{ $category->slug }}')">
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
                        <x-card-post :post="$post" />
                    @endforeach
                @endif

                <x-modals.more-information-post-modal />
                <x-modals.new-post-modal />
            </div>
        </section>
    </x-container>
@endsection

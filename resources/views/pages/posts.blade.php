@extends("layouts.default")

@section("content")
    <x-container>
        <h1 class="text-2xl font-bold text-center text-orange-500">My Posts</h1>
         <section class="py-4">
                <x-breadcrumbs>
                    <x-breadcrumbs.item class="px-4">All</x-breadcrumbs.item>
                    @foreach ($categories as $category)
                        <x-breadcrumbs.item>
                            {{ $category->name }}
                        </x-breadcrumbs.item>
                    @endforeach
                </x-breadcrumbs>
            </section>
            <section>
                <div
                    class="grid items-start grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
                >
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
@endsection

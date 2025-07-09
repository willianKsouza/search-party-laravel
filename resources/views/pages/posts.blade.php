@extends("layouts.default")

@section("content")
    <x-container>
        <h1 class="text-2xl font-bold text-center text-orange-500">My Posts</h1>
        <section x-data="post()">
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
                        </div>
                    </div>
                @endforeach

                <x-modals.more-information-post-modal />
                <x-modals.new-post-modal />
            </div>
        </section>
    </x-container>
@endsection

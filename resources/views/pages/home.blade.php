@extends('layouts.default')
@section('content')
    <section>
        <x-container>
            <section class="mt-8 grid grid-cols-12 gap-4">
                <form action="" method="get" class="col-span-12 md:col-span-10 flex items-center gap-4">
                    <input type="text" name="q" placeholder="Buscar..."
                        class="flex-1 px-4 py-3 border-2 border-orange-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors duration-200">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Buscar
                    </button>
                </form>
                <div class="col-span-12 md:col-span-2 flex justify-end">
                    <button type="button"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200 flex justify-center items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Novo Post
                    </button>
                </div>
            </section>
            <section>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
                    @foreach (range(1, 9) as $post)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $post }}</h2>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $post }}</p>
                            <a href="#"
                                class="mt-4 inline-block text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Leer
                                más</a>
                        </div>
                    @endforeach

                </div>
            </section>
        </x-container>
    </section>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-zinc-500">
    <header class="bg-white dark:bg-gray-900">
        <x-container>
            <nav class="flex justify-center items-center py-4">
                <a href="{{ route('pages.home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="size-[40px] w-full">
                    {{-- <span class="text-orange-500 font-bold text-lg">Search Party</span> --}}
                </a>
            </nav>
        </x-container>
    </header>
    @yield('content')
    @vite(['resources/js/app.js'])
</body>
</html>

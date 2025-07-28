<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#1b2a36] flex flex-col h-screen">
    <header class="bg-white dark:bg-gray-900">
        <x-container>
            <nav class="flex justify-center items-center py-4">
                <a href="{{ route('pages.home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="size-[40px] w-full">
                </a>
            </nav>
        </x-container>
    </header>
    <main class="h-full flex items-center">
        @yield('content')
    </main>
    @vite(['resources/js/app.js'])
</body>
</html>

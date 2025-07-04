<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-zinc-500 relative">
    <x-themes.header />
    @yield('content')
    @vite(['resources/js/app.js'])
</body>
</html>

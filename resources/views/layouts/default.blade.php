<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#1b2a36] relative ">
    <x-themes.header />
    <x-themes.header-mobile />
    
    @yield('content')
    @vite(['resources/js/app.js'])
</body>
</html>

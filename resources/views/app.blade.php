<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Project Task Management System') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="bg-gray-100 text-gray-900">
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>
</body>
</html>

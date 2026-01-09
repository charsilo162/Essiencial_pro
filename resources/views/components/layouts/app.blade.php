<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
      @livewireStyles
</head>

<body class="font-sans bg-gray-50 text-gray-800 antialiased">

    {{-- TOP NAV --}}
    <x-navigation.header />

    {{-- PAGE CONTENT --}}
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>

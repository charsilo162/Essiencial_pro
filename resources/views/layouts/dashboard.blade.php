<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-gray-50 text-gray-800">
    <!-- Include Header -->
    <x-layouts.dashboardheader />

    <!-- Sidebar (Dynamic Section) -->
    @yield('sidebar')

    <!-- Main Content -->
    <div class="w-full lg:ps-64 pt-4 px-4 sm:px-6 md:px-8">
        {{-- {{ $slot ?? '' }} --}}
        @yield('content')
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.querySelector("[data-hs-overlay]");
            const sidebar = document.getElementById("mobile-menu");

            if (toggleButton && sidebar) {
                toggleButton.addEventListener("click", function() {
                    sidebar.classList.toggle("-translate-x-full");
                    sidebar.classList.toggle("translate-x-0");
                });
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body
    x-data="{ sidebarOpen: false }"
    @toggle-sidebar.window="sidebarOpen = !sidebarOpen"
    class="bg-gray-50 min-h-screen"
>

    {{-- Header --}}
    <x-navigation.header :hasSidebar="true" />

    {{-- Main layout --}}
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
     <aside
    class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900
           transition-transform duration-300
           lg:static lg:translate-x-0 lg:block lg:sticky lg:top-[72px]"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    x-cloak
>
    <div class="h-full overflow-y-auto">
        <livewire:category-sidebar />
    </div>
</aside>


        {{-- Overlay for mobile --}}
        <div x-show="sidebarOpen"
             x-cloak
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black/50 z-40 lg:hidden">
        </div>

        {{-- Main content --}}
        <main class="flex-1 min-w-0 p-6 lg:p-8">
            @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>

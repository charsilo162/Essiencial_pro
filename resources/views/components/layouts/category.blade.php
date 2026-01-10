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
    class="bg-gray-50 text-gray-900"
>

    {{-- Shared Top Nav --}}
    <x-navigation.header />

    <div class="flex w-full min-h-[calc(100vh-80px)] relative">

        {{-- Mobile overlay --}}
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-black/40 z-40 lg:hidden"
        ></div>

        {{-- Sidebar --}}
     <aside
            class="fixed lg:static inset-y-0 left-0 z-50 w-72
                bg-slate-900 text-white border-r border-slate-800
                transform transition-transform duration-300
                lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >

            <livewire:category-sidebar
                :active-category-slug="$activeCategorySlug ?? null"
            />
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 w-full p-6 bg-gray-50">
            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot }}
        </main>

    </div>

    @livewireScripts
</body>
</html>

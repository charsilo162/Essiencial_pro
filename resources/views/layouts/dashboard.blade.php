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

<body 
    x-data="{ sidebarOpen: false }"
    @toggle-sidebar.window="sidebarOpen = !sidebarOpen"
    class="antialiased font-sans bg-gray-50 text-gray-800 min-h-screen"
>
    <!-- Header -->
    <x-layouts.dashboardheader />

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-e border-gray-200 transform transition-transform duration-300
                   lg:static lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        >
            @yield('sidebar')
        </aside>

        <!-- Overlay -->
        <div 
            x-show="sidebarOpen"
            @click="sidebarOpen = false"
            x-cloak
            class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        ></div>

        <!-- Main content -->
        <div class="flex-1 pt-4 px-4 sm:px-6 md:px-8">
            @yield('content')
        </div>
    </div>

    <!-- Toast stays unchanged -->
 {{-- Toast --}}
<div
    x-data="{ 
        show: false, 
        message: '', 
        type: 'success',
        showToast(event) {
            this.message = event.detail.message;
            this.type = event.detail.type || 'success';
            this.show = true;
            setTimeout(() => { this.show = false }, 3000);
        }
    }"
    @toast.window="showToast($event)"
    @success-notification.window="showToast($event)"
    x-show="show"
    x-transition
    x-cloak
    class="fixed bottom-5 right-5 z-[99999]"
>
    <div :class="type === 'success' ? 'bg-green-600' : 'bg-red-600'" 
         class="text-white px-6 py-3 rounded-lg shadow-xl flex items-center gap-3">
        <span x-text="message"></span>
    </div>
</div>
</body>

</html>

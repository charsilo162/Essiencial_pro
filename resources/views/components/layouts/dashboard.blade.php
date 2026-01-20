<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-900">

<div x-data="{ sidebarOpen: false }" class="min-h-screen flex">

    {{-- Mobile backdrop --}}
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-40 md:hidden"
        x-cloak
    ></div>

    {{-- Sidebar --}}
    <aside
        class="fixed md:static inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transform transition-transform duration-300"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
    >
        <x-dashboard.sidebar />
        
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col min-w-0">

        {{-- Topbar --}}
        <x-dashboard.topbar />

        {{-- Modals --}}
        @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
            <livewire:course.post-course />
            <livewire:post-center />
        @endif
        <livewire:course.edit-course />

        {{-- Content --}}
        <main class="flex-1 p-6 w-full">
            {{ $slot }}
        </main>
    </div>

</div>

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

@livewireScripts
</body>
</html>

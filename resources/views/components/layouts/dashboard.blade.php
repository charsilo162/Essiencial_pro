@props(['title' => null])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100"
      x-data="{ sidebarOpen: false }">

<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside
        class="fixed inset-y-0 left-0 z-40 w-64
               transform transition-transform duration-300 ease-in-out
               md:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        {{-- DEFAULT SIDEBAR (FALLBACK) --}}
        {{ $sidebar ?? view('layouts.partials.sidebar') }}
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="flex flex-col flex-1 min-h-screen md:ml-64">

        {{-- TOPBAR --}}
        @include('layouts.partials.topbar')

        {{-- PAGE CONTENT --}}
        <main class="flex-1 p-4 md:p-6">
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

@props(['open' => 'sidebarOpen'])

<aside
    class="fixed inset-y-0 left-0 z-40 w-64
           transform transition-transform duration-300 ease-in-out
           md:translate-x-0"
    :class="{{ $open }} ? 'translate-x-0' : '-translate-x-full'"
>

    {{-- GRADIENT --}}
    <div class="absolute inset-0 bg-gradient-to-b
                from-orange-400 via-pink-500 to-yellow-400
                opacity-90
                dark:from-orange-600 dark:via-pink-700 dark:to-yellow-600"></div>

    {{-- GLASS --}}
    <div class="absolute inset-0 backdrop-blur-xl
                bg-white/40 dark:bg-neutral-900/70"></div>

    {{-- CONTENT --}}
    <div class="relative flex flex-col h-full text-neutral-900 dark:text-white">
        {{ $slot }}
    </div>
</aside>

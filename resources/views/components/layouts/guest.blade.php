<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
   

                {{-- The entire <flux:sidebar stashable sticky...> section has been removed --}}

        <main class="p-6 md:p-8">
            {{ $slot }}
        </main>

        @fluxScripts
    </body>
</html>
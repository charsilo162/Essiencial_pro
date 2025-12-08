<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')

    <style>
        .fade-in {
            animation: fadeIn 1.1s ease-in-out forwards;
            opacity: 0;
        }
        @keyframes fadeIn { to { opacity: 1; } }

        .float {
            animation: float 4s ease-in-out infinite;
        }
        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
    </style>

    @livewireStyles
</head>

<body class="bg-gray-50 font-sans text-black">

    {{-- Navbar Component --}}
    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
  
</body>
</html>

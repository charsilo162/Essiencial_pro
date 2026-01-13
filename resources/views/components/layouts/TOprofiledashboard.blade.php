@extends('layouts.dashboard')

@section('sidebar')
    <x-layouts.profile-sidebar />
@endsection

@section('content')
    {{ $slot }}

    {{-- 🛑 INSERT THE NOTIFICATION CODE HERE 🛑 --}}
    <div 
    x-data="{ show: false, message: '', type: '' }"
    x-cloak
    x-init="
        Livewire.on('success-notification', (payload) => {
            message = payload.message;
            type = payload.type;
            show = true;
            setTimeout(() => { show = false }, 4000);
        
        });
        console.log('Event received:', payload);

    "
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    class="fixed bottom-5 right-5 z-[9999] p-4 rounded-lg shadow-xl text-white font-medium"
    :class="{ 'bg-green-600': show }"
>
    <div class="flex items-center">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg>
        <span x-text="message"></span>
    </div>
</div>

@endsection
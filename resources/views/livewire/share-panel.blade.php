{{-- resources/views/livewire/share-panel.blade.php --}}
<div x-data="{ open: false }" class="flex items-center space-x-3 relative">
    <button 
        @click="open = !open"
        class="flex items-center space-x-2 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-5 py-3 rounded-full font-semibold shadow-lg transition transform hover:scale-105"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.684 12.685 9.214 12.155 9.87 12.155h4.26c.657 0 1.186.53 1.186 1.187 0 .656-.53 1.186-1.186 1.186h-4.26c-.657 0-1.186-.53-1.186-1.186zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
        </svg>
        <span>Share ({{ $shareCount }})</span>
        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div 
        x-show="open" 
        @click.away="open = false"
        x-transition
        class="absolute top-full left-1/2 -translate-x-1/2 mt-2 bg-white rounded-xl shadow-2xl border border-gray-200 py-3 w-56 z-50"
    >
        @foreach ($platforms as $key => $plat)
            <button 
                wire:click="share('{{ $key }}')"
                class="w-full px-4 py-3 flex items-center space-x-3 hover:bg-gray-50 transition text-left"
            >
                <svg class="w-6 h-6 {{ $plat['color'] }}" fill="currentColor" viewBox="0 0 24 24">
                    <path d="{{ $plat['icon'] }}" />
                </svg>
                <span class="font-medium text-gray-700">{{ $plat['name'] }}</span>
            </button>
        @endforeach
    </div>
</div>
<script>
    document.addEventListener('open-share-window', function (e) {
        // e.detail.url contains the generated share URL
        const url = e.detail.url;
        
        if (url) {
            // Open the share URL in a new window/tab
            window.open(url, '_blank', 'width=600,height=400,resizable=yes');
        }
    });

    // You also need the 'copy-to-clipboard' listener if you don't have it
    document.addEventListener('copy-to-clipboard', function (e) {
        navigator.clipboard.writeText(e.detail.url).then(() => {
            // Optional: Show a brief success message using another Livewire event or simple JS
        });
    });
</script>
{{-- resources/views/livewire/share-panel.blade.php --}}
<div x-data="{ open: false }" class="flex items-center space-x-3 relative">
    <button @click="open = !open"
    class="px-4 py-2 text-sm bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition">
    Share ({{ $shareCount }})
</button>


  <div 
    x-show="open" 
    @click.away="open = false"
    x-transition
    class="absolute right-0 mt-2 bg-white rounded-xl shadow-lg border border-gray-200 py-2 w-56 z-50"
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
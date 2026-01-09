@props(['video'])

<div {{ $attributes->merge(['class' => 'p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300']) }}>
    <div class="h-32 w-full rounded-lg overflow-hidden mb-3 relative">
        @if ($video['thumbnail_url'])
            <img src="{{ $video['thumbnail_url'] }}" alt="{{ $video['title'] }}" class="w-full h-full object-cover">
        @else
            <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </div>
        @endif
        <div class="absolute top-2 right-2">
            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $video['publish'] ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                {{ $video['publish'] ? 'Published' : 'Draft' }}
            </span>
        </div>
    </div>

    <h3 class="text-md font-semibold text-gray-800 mb-1 line-clamp-2">{{ $video['title'] }}</h3>

    @if ($video['duration'])
        <p class="text-xs text-gray-500 mb-3">{{ \Carbon\CarbonInterval::seconds($video['duration'])->cascade()->forHumans() }}</p>
    @endif

    <div class="flex justify-between items-center mt-4">
        <button wire:click="togglePublish({{ $video['id'] }})"
                class="flex-1 mx-1 py-2 px-3 text-xs font-medium rounded-lg transition
                       {{ $video['publish'] ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-green-600 hover:bg-green-700 text-white' }}">
            {{ $video['publish'] ? 'Unpublish' : 'Publish' }}
        </button>

        <button wire:click="openEditModal({{ $video['id'] }})"
                class="p-2 text-gray-600 hover:text-orange-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
        </button>

        <button wire:click="deleteVideo({{ $video['id'] }})" wire:confirm="Delete this video?"
                class="p-2 text-gray-600 hover:text-red-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
        </button>
    </div>
</div>
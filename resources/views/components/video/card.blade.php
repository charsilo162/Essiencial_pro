@props(['video'])

<div {{ $attributes->merge(['class' => 'p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full']) }}>
    {{-- Thumbnail Section --}}
    <div class="h-32 w-full rounded-lg overflow-hidden mb-3 relative group">
        @php 
            // Get the first course slug for the link
            $firstCourse = $video['courses'][0] ?? null;
            $slug = $firstCourse['slug'] ?? ($video['slug'][0] ?? null);
        @endphp

        @if ($slug)
            <a href="{{ route('course.watch', ['slug' => $slug]) }}">
        @endif
            @if ($video['thumbnail_url'])
                <img src="{{ $video['thumbnail_url'] }}" alt="{{ $video['title'] }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            @else
                <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
            @endif
        @if ($slug) </a> @endif

        {{-- Status Badge --}}
        <div class="absolute top-2 right-2">
            <span class="px-2 py-1 text-[10px] uppercase tracking-wider font-bold rounded-md shadow-sm {{ $video['publish'] ? 'bg-green-500 text-white' : 'bg-amber-500 text-white' }}">
                {{ $video['publish'] ? 'Live' : 'Draft' }}
            </span>
        </div>
    </div>

    {{-- Course Title (Professional Position: Above Video Title) --}}
    @if($firstCourse)
        <div class="flex items-center gap-1 mb-1">
            <span class="text-[10px] font-bold text-blue-600 uppercase tracking-tight">Course:</span>
            <span class="text-xs font-medium text-gray-500 truncate">{{ $firstCourse['title'] }}</span>
        </div>
    @else
        <div class="mb-1">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tight">Standalone Video</span>
        </div>
    @endif

    {{-- Video Title --}}
    <h3 class="text-sm font-bold text-gray-900 mb-1 line-clamp-2 leading-snug hover:text-blue-600 transition">
        {{ $video['title'] }}
    </h3>

    {{-- Metadata --}}
    <div class="flex items-center text-[11px] text-gray-500 gap-3 mt-auto">
        @if ($video['duration'])
            <span class="flex items-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                {{ \Carbon\CarbonInterval::seconds($video['duration'])->cascade()->forHumans(['short' => true]) }}
            </span>
        @endif
        <span>{{ $video['created_at'] }}</span>
    </div>

    {{-- Action Buttons --}}
    <div class="flex justify-between items-center mt-4 pt-3 border-t border-gray-100">
        <button wire:click="togglePublish({{ $video['id'] }})"
                class="flex-1 mr-2 py-1.5 px-3 text-xs font-semibold rounded-lg transition shadow-sm
                       {{ $video['publish'] ? 'bg-gray-100 text-gray-700 hover:bg-gray-200' : 'bg-indigo-600 text-white hover:bg-indigo-700' }}">
            {{ $video['publish'] ? 'Unpublish' : 'Publish Now' }}
        </button>

        <div class="flex gap-1">
            <button wire:click="openEditModal({{ $video['id'] }})"
                    class="p-2 text-gray-500 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition" title="Edit Video">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </button>

            <button wire:click="deleteVideo({{ $video['id'] }})" wire:confirm="Delete this video?"
                    class="p-2 text-gray-500 hover:bg-red-50 hover:text-red-600 rounded-lg transition" title="Delete">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </div>
    </div>
</div>
@props([
    'commentsCount' => 0,
    'viewsCount' => 0,
    'likesCount' => 0, // NEW PROP
    'sharesCount' => 0, // NEW PROP
    'timeElapsed' => null, // Added the clock icon stat
])

{{-- This flex container holds all the stats --}}
<div class="flex flex-wrap gap-4 border-b border-gray-200 pb-4 mb-4 text-sm text-gray-600">
    
    {{-- Time/Clock Icon (Taken from the original HTML's clock icon) --}}
    @if ($timeElapsed)
    <span class="flex items-center gap-1">
        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13.25a.75.75 0 00-1.5 0v5.5a.75.75 0 00.75.75h4.5a.75.75 0 000-1.5H11.5V6.75z" clip-rule="evenodd"></path>
        </svg>
        <span>{{ $timeElapsed }}</span>
    </span>
    @endif
    
    {{-- Comments Count (Uses your existing SVG) --}}
    <span class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586M2 12V6a2 2 0 012-2h12a2 2 0 012 2v3" />
        </svg>
        <span>{{ $commentsCount }} Comments</span>
    </span>

    {{-- Likes Count (NEW - Replicating the Eye/Like icon from original HTML) --}}
    {{-- NOTE: Since you're using Livewire for dynamic likes, this count may need to come from the Livewire component if you need real-time updates. If this is just a static initial total, this is fine. --}}
    <span class="flex items-center gap-1">
        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
            <path fill-rule="evenodd" d="M.458 10C1.732 5.602 6.008 3 10 3s8.268 2.602 9.542 7c-1.274 4.398-5.55 7-9.542 7S1.732 14.398.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
        </svg>
        <span>{{ $likesCount }} Likes</span>
    </span>
    
    {{-- Views Count (Uses your existing SVG) --}}
    {{-- <span class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        <span>{{ $viewsCount }} Views</span>
    </span> --}}
    
    {{-- Shares Count (NEW - Using the same icon as Likes/Views for simplicity, feel free to change) --}}
    {{-- <span class="flex items-center gap-1">
        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
             <path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
             <path fill-rule="evenodd" d="M.458 10C1.732 5.602 6.008 3 10 3s8.268 2.602 9.542 7c-1.274 4.398-5.55 7-9.542 7S1.732 14.398.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
        </svg>
        <span>{{ $sharesCount }} Shares</span>
    </span> --}}
</div>
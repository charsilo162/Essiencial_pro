{{-- This is the single root element for the Livewire component --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    {{-- Main Content Wrapper --}}
    <div class="flex flex-col lg:flex-row gap-6 items-start pt-4">

        {{-- LEFT COLUMN - Topics & Course Title --}}
        <aside class="w-full lg:w-1/3">
            
            {{-- Main Course Title --}}
            <div class="mb-4">
                <h1 class="text-gray-800 text-sm font-normal tracking-wide uppercase leading-none">
                    {{ Str::upper(Str::before($course['title'], ' ')) }}
                    <span class="block">{{ Str::upper(Str::after($course['title'], ' ')) }}</span>
                </h1>
            </div>

            <h2 class="text-gray-800 font-semibold mb-3 border-b pb-1">Topics</h2>
            <ul class="space-y-1 text-sm">
                @forelse ($videos as $video)
                    @php
                        $isActive = $currentVideo && $currentVideo['id'] === $video['id'];
                        $linkClasses = $isActive ? 'text-cyan-600 font-medium' : 'text-gray-600 hover:text-cyan-600';
                        // FIX: Use null-safe operator to access pivot data safely
                        $partNumber = (($video['pivot'] ?? [])['order_index'] ?? 'N/A');
                    @endphp
                    <li>
                        <a href="#"
                            wire:click.prevent="setCurrentVideo({{ $video['id'] }})"
                            class="{{ $linkClasses }}"
                        >
                            Part {{ $partNumber }}: {{ $video['title'] }}
                        </a>
                    </li>
                @empty
                    <li>No videos available for this course.</li>
                @endforelse
            </ul>
        </aside>

        {{-- RIGHT COLUMN - Video Player --}}
        <div class="w-full lg:w-2/3">
            @if ($currentVideo)
                
                {{-- Blue Header Bar (Video Title) --}}
                <div class="flex items-center justify-between bg-white border-b-2 border-cyan-500 px-4 py-2">
                    <span class="text-gray-700 font-normal">
                        {{ $currentVideo['title'] }}
                    </span>
                    
                    {{-- Thumbs Up/Down icons - Integrate the existing Livewire component --}}
                    <div class="flex items-center space-x-2">
                        @livewire('interaction-panel', [
                            'resourceId' => $currentVideo['id'],
                            'resourceType' => \App\Models\Video::class 
                        ], key('video-vote-'.$currentVideo['id'])) 
                    </div>
                </div>

                {{-- Video Player Area --}}
                <div class="relative bg-black group aspect-video">
                    {{-- 
                        CRITICAL FIX: Use wire:key to force the browser to replace the 
                        entire iframe element when $currentVideo['id'] changes.
                    --}}
                    <iframe
                        wire:key="video-player-{{ $currentVideo['id'] }}"
                        class="w-full h-full"
                        {{-- src="{{ $currentVideo['video_url'] }}"  --}}
                        src="{{ asset($currentVideo['video_url']) }}"
                        frameborder="0" 
                        allowfullscreen
                    ></iframe>
                    
                    {{-- PART badge --}}
                    <div class="absolute top-4 right-8 transform rotate-6 bg-green-500 p-2 shadow-xl">
                        <span class="text-white text-3xl font-bold uppercase">
                            PART {{ (($currentVideo['pivot'] ?? [])['order_index'] ?? 'N/A') }}
                        </span>
                    </div>
                </div>
            @else
                <div class="aspect-video bg-gray-200 flex items-center justify-center text-gray-600">
                    No videos found for this course.
                </div>
            @endif
        </div>

    </div>

    {{-- Description Section --}}
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Description</h2>
        <p>{{ $currentVideo['description'] ?? $course['description'] }}</p>
    </div>
</section>
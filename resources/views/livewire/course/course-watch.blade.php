<div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-4 md:px-8 py-6">
    <!-- ========================= -->
    <!-- MOBILE VIDEO FIRST -->
    <!-- ========================= -->
    <div class="md:hidden">
        <!-- VIDEO -->
        @if ($currentVideo)
            <div wire:key="mobile-video-player-{{ $currentVideo['id'] }}-{{ $playerKey }}" 
             class="w-full rounded-xl overflow-hidden shadow-lg mb-6 relative bg-black group aspect-video border-2 border-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]"> 
                {{--
                    CRITICAL FIX: Use wire:key to force the browser to replace the
                    entire iframe element when $currentVideo['id'] changes.
                --}}
                <iframe
                  
                    class="w-full h-full"
                    src="{{ asset($currentVideo['video_url']) }}"
                    frameborder="0"
                    allowfullscreen
                ></iframe>
                
                {{-- PART badge --}}
                <div class="absolute top-4 right-8 transform rotate-6 bg-[#661437] p-2 shadow-xl rounded-md">
                    <span class="text-white text-3xl font-bold uppercase">
                        PART {{ (($currentVideo['pivot'] ?? [])['order_index'] ?? 'N/A') }}
                    </span>
                </div>
            </div>
        @else
            <div class="w-full rounded-xl overflow-hidden shadow-lg mb-6 aspect-video bg-gray-200 flex items-center justify-center text-gray-600 border-2 border-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]">
                No videos found for this course.
            </div>
        @endif
        <!-- MOBILE COLLAPSIBLE TOPICS -->
        <div x-data="{ open: false }"
             class="md:hidden mb-6 bg-white rounded-xl shadow-md p-4 border-2 border-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]">
             
            <button @click="open = !open"
                class="w-full flex items-center justify-between text-sm font-semibold text-gray-800">
                Topics
                <span x-text="open ? '▲' : '▼'"></span>
            </button>
            <div x-show="open" class="mt-3 space-y-1" x-transition>
                <ul class="space-y-1 text-sm">
                    @forelse ($videos as $video)
                        @php
                            $isActive = $currentVideo && $currentVideo['id'] === $video['id'];
                            $linkClasses = $isActive ? 'block px-3 py-2 bg-[#6A3318]/10 text-[#661437] font-semibold rounded-md' : 'block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md';
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
                        <li class="block px-3 py-2 text-gray-700">No videos available for this course.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <!-- ========================= -->
    <!-- DESKTOP LEFT SIDEBAR -->
    <!-- ========================= -->
    <div class="hidden md:block md:col-span-1 bg-white rounded-xl shadow-md p-4 h-fit sticky top-24 max-h-[82vh] overflow-y-auto border-2 border-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]">
        {{-- Main Course Title --}}
        <div class="mb-4">
            <h1 class="text-gray-800 text-sm font-normal tracking-wide uppercase leading-none">
                {{ Str::upper(Str::before($course['title'], ' ')) }}
                <span class="block">{{ Str::upper(Str::after($course['title'], ' ')) }}</span>
            </h1>
        </div>
        <h3 class="text-sm font-semibold text-gray-900 mb-3">Topics</h3>
        <div class="space-y-1">
            <ul class="space-y-1 text-sm">
                @forelse ($videos as $video)
                    @php
                        $isActive = $currentVideo && $currentVideo['id'] === $video['id'];
                        $linkClasses = $isActive ? 'block px-3 py-2 bg-[#6A3318]/10 text-[#661437] font-semibold rounded-md' : 'block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md';
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
                    <li class="block px-3 py-2 text-gray-700">No videos available for this course.</li>
                @endforelse
            </ul>
        </div>
    </div>
    <!-- ========================= -->
    <!-- MAIN RIGHT CONTENT -->
    <!-- ========================= -->
    <div class="md:col-span-3 space-y-10">
        <!-- DESKTOP VIDEO -->
        <div wire:key="desktop-video-player-{{ $currentVideo['id'] }}-{{ $playerKey }}"
             class="hidden md:block w-full rounded-xl overflow-hidden shadow-lg relative bg-black group aspect-video border-2 border-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]">
            @if ($currentVideo)
                <iframe
                    
                    class="w-full h-full"
                    src="{{ asset($currentVideo['video_url']) }}"
                    frameborder="0"
                    allowfullscreen
                ></iframe>
                
                {{-- PART badge --}}
                <div class="absolute top-4 right-8 transform rotate-6 bg-[#661437] p-2 shadow-xl rounded-md">
                    <span class="text-white text-3xl font-bold uppercase">
                        PART {{ (($currentVideo['pivot'] ?? [])['order_index'] ?? 'N/A') }}
                    </span>
                </div>
                {{-- Header Bar (Video Title) - Positioned above the video for desktop, themed to match nav --}}
                <div class="absolute top-0 left-0 w-full flex items-center justify-between bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F] px-4 py-2">
                    <span class="text-white font-normal">
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
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-600">
                    No videos found for this course.
                </div>
            @endif
        </div>
        <!-- DESCRIPTION BOX -->
        <div class=" rounded-xl p-6 shadow-md border-2 border-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Lecture Description</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ $currentVideo['description'] ?? $course['description'] }}
            </p>
        </div>
     
    </div>
</div><!-- END GRID -->
<livewire:center.our-locations />

 @livewire('comment-section', [
        'resourceId' => $course['id'],
        'resourceType' => 'App\\Models\\Course'
    ])

<div>

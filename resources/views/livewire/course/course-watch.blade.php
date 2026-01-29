{{-- Single root element --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col lg:flex-row gap-6 items-start pt-4">

        {{-- LEFT COLUMN --}}
        <aside class="w-full lg:w-1/3">

            {{-- Course Title --}}
            <div class="mb-4">
                <h1 class="text-gray-800 text-sm font-normal tracking-wide uppercase leading-none">
                    {{ Str::upper(Str::before($course['title'], ' ')) }}
                    <span class="block">
                        {{ Str::upper(Str::after($course['title'], ' ')) }}
                    </span>
                </h1>
            </div>

            <h2 class="text-gray-800 font-semibold mb-3 border-b pb-1">
                Topics
            </h2>

            <ul class="space-y-1 text-sm">
                @forelse ($videos as $video)
                    @php
                        $isActive = $currentVideo && $currentVideo['id'] === $video['id'];
                    @endphp

                    <li class="flex items-center justify-between">
                        <a
                            href="#"
                            wire:click.prevent="setCurrentVideo({{ $video['id'] }})"
                            class="{{ $isActive
                                ? 'text-cyan-600 font-medium'
                                : 'text-gray-600 hover:text-cyan-600' }}"
                        >
                            Part {{ $video['order_index'] }}: {{ $video['title'] }}
                        </a>

                        @if (!empty($video['duration']))
                            <span class="text-xs text-gray-400">
                                {{ gmdate('i:s', $video['duration']) }}
                            </span>
                        @endif
                    </li>
                @empty
                    <li class="text-gray-500">
                        No videos available for this course.
                    </li>
                @endforelse
            </ul>
        </aside>

        {{-- RIGHT COLUMN --}}
        <div class="w-full lg:w-2/3">
            @if ($currentVideo)

                {{-- Header --}}
                <div class="flex items-center justify-between bg-white border-b-2 border-cyan-500 px-4 py-2">
                    <span class="text-gray-700 font-normal">
                        {{ $currentVideo['title'] }}
                    </span>

                    @livewire('interaction-panel', [
                        'resourceId'   => $currentVideo['id'],
                        'resourceType'=> \App\Models\Video::class
                    ], key('video-vote-'.$currentVideo['id']))

                      {{-- @livewire('rating-panel', [
                        'resourceId'   => $currentVideo['id'],
                        'resourceType' => \App\Models\Video::class
                    ], key('video-rating-'.$currentVideo['id'])) --}}

                            <livewire:rating-panel
                            :resource-id="$course['id']"
                            :resource-type="\App\Models\Course::class"
                            :key="'course-rating-'.$course['id']"
                        />

                </div>

                {{-- Video --}}
                <div class="relative bg-black aspect-video">

                    <iframe
                        wire:key="video-player-{{ $currentVideo['id'] }}"
                        class="w-full h-full"
                        src="{{ asset($currentVideo['video_url']) }}"
                        frameborder="0"
                        allowfullscreen
                    ></iframe>

                    {{-- PART Badge --}}
                    <div class="absolute top-4 right-6 rotate-6 bg-green-500 px-3 py-1 shadow-xl">
                        <span class="text-white text-2xl font-bold uppercase">
                            PART {{ $currentVideo['order_index'] }}
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

    {{-- Description --}}
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">
            Description
        </h2>
        <p>
            {{ $currentVideo['description'] ?? $course['description'] }}
        </p>
    </div>
  @livewire('comment-section', [
        'resourceId' => $course['id'],
        'resourceType' => 'App\Models\Course'
    ])
</section>

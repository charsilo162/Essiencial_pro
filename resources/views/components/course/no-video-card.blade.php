{{-- resources/views/components/course/no-video-card.blade.php --}}
@props(['course'])

@php
// dd($course);
    // $course is now an array → use array syntax
    $hasVideos = ($course['videos_count'] ?? 0) > 0;
    $isPublished = $course['publish'] ?? false;
@endphp

<div {{ $attributes->merge(['class' => 'p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300']) }}>
    <div class="h-32 w-full rounded-lg overflow-hidden mb-3">
        @if (!empty($course['image_thumbnail_url']))
            <img src="{{ $course['image_thumbnail_url'] }}" 
                 alt="{{ $course['title'] }}" 
                 class="w-full h-full object-cover">
        @else
            <div class="bg-gray-200 w-full h-full flex items-center justify-center text-gray-500 text-xs">
                No image
            </div>
        @endif
    </div>

    <h3 class="text-md font-semibold text-gray-800 mb-1">
        {{ $course['title'] }}
    </h3>

    <p class="text-sm text-gray-500 mb-4">
        {{ $isPublished ? 'Published' : 'Draft' }} •
        {{ $course['category']['name'] ?? '—' }}
    </p>

    <!-- ACTION BUTTONS -->
    @if (!$hasVideos)
        <button wire:click="openAddVideoModal({{ $course['id'] }})"
                class="w-full py-2 px-4 text-sm font-semibold rounded-lg bg-orange-600 text-white hover:bg-orange-700 transition">
            Add First Video
        </button>

    @elseif (!$isPublished)
        <button wire:click="publish({{ $course['id'] }})"
                class="w-full py-2 px-4 text-sm font-semibold rounded-lg bg-green-600 text-white hover:bg-green-700 transition">
            Publish Course
        </button>

    @else
        <button wire:click="$dispatch('open-add-video-modal', {{ $course['id'] }})"
                class="w-full py-2 px-4 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
            Add Part {{ ($course['videos_count'] ?? 0) + 1 }}
        </button>
    @endif
</div>
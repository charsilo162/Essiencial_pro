@php
    $isPhysical = $course['type'] === 'physical';

    $center = $isPhysical && !empty($course['centers'])
        ? $course['centers'][0]
        : null;

    $ctaUrl = $isPhysical && $center
        ? route('center.show', ['slug' => $center['slug'] ?? $center['id']])
        : route('course.watch', ['slug' => $course['slug']]);

    $ctaLabel = $isPhysical ? '🏫 View Center Details' : '▶️ Watch Now';
@endphp

<div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100
            transform hover:shadow-xl transition duration-300">

    {{-- Thumbnail --}}
    <div class="relative h-48 bg-gray-200">
        <img
            src="{{ $course['image_thumbnail_url'] ?? asset('images/default-course-thumb.jpg') }}"
            alt="{{ $course['title'] }} Thumbnail"
            class="w-full h-full object-cover"
        >
    </div>

    <div class="p-5">
        {{-- Title --}}
        <h3 class="text-xl font-semibold text-gray-800 mb-2 truncate"
            title="{{ $course['title'] }}">
            {{ $course['title'] }}
        </h3>

        {{-- Video info --}}
        @php
            $firstVideo = $this->getFirstCourseVideo($course);
            $videoIndex = $firstVideo
                ? ($firstVideo['pivot']['order_index'] ?? 0) + 1
                : 1;
        @endphp

        <p class="text-sm text-gray-500 mb-4">
            Video Part:
            <span class="font-medium text-indigo-600">
                Part {{ $videoIndex }}
            </span>
        </p>

        {{-- CTA --}}
       <a
                href="{{ $ctaUrl }}"
                class="inline-block w-full text-center bg-indigo-600 hover:bg-indigo-700
                    text-white font-bold py-2 px-4 rounded transition"
            >
                {{ $ctaLabel }}
            </a>
    </div>
</div>

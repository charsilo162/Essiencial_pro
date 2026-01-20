<x-layouts.app title="Course Details">

    {{-- 1. Hero Section --}}
   <x-course.detail
    :image="$course['image_thumbnail_url'] ?? asset('storage/img3.png')"
    :title="$course['title']"
    :description="$course['description']"
    :rating="$course['rating'] ?? null"
    :tags="array_filter([
        ucfirst($course['type'] ?? null),
        $course['category']['name'] ?? null
    ])"
    :badge="$course['badge'] ?? null"
>

    <x-slot:interactionStats>
        <x-shared.resource-stats
            :commentsCount="$course['comments_count'] ?? 0"
            :viewsCount="$course['views_count'] ?? 0"
            :likesCount="$course['likes_count'] ?? 0"
            :sharesCount="$course['shares_count'] ?? 0"
            :timeElapsed="\Carbon\Carbon::parse($course['created_at'])->diffForHumans()"
        />
    </x-slot>

    <x-slot:thumbs>
        @livewire('interaction-panel', [
            'resourceId' => $course['id'],
            'resourceType' => \App\Models\Course::class
        ])
    </x-slot>

    <x-slot:share>
        <livewire:share-panel
            :resource-id="$course['id']"
            :resource-type="\App\Models\Course::class"
        />
    </x-slot>

    <x-slot:footer>
        <div>
            <span class="text-2xl font-semibold text-blue-600">
                {{ $course['price_formatted'] ?? '$99.00' }}
            </span>
        </div>

        @if(session('user'))
            <a
                href="{{ route('enroll.course', $course['slug']) }}"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium"
            >
                Enroll
            </a>
        @else
            <a
                href="{{ route('logins') }}"
                class="px-6 py-2 border rounded-lg text-sm"
            >
                Login to Enroll
            </a>
        @endif
    </x-slot>

    <x-slot:extra>
        {{-- instructor OR center info --}}
    </x-slot>

</x-course.detail>
@if (!empty($success))
<div x-data="{ show: true }" x-show="show"
     class="mb-4 flex items-start justify-between rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">
    <span>{{ $success }}</span>
    <button @click="show = false" class="font-bold">×</button>
</div>
@endif
@if (!empty($error))
<div x-data="{ show: true }" x-show="show"
     class="mb-4 flex items-start justify-between rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">
    <span>{{ $success}}</span>
    <button @click="show = false" class="font-bold">×</button>
</div>
@endif
    {{-- 2. Course Description --}}
    <x-shared.content-description title="About This Course">
        <p>{{ $course['long_description_p1'] ?? 'Detailed course content coming soon...' }}</p>
        <p class="mt-4">{{ $course['long_description_p2'] ?? '' }}</p>
        <p class="mt-4">{{ $course['long_description_p3'] ?? '' }}</p>
    </x-shared.content-description>

    {{-- 3. Comments --}}
    @livewire('comment-section', [
        'resourceId' => $course['id'],
        'resourceType' => 'App\\Models\\Course'
    ])

    {{-- 4. Related Courses by Tutor --}}
    <div class="mt-12">
        <livewire:course.course-list 
            :tutorId="$course['assigned_tutor_id'] ?? null"
            :usePagination="false"
        />
    </div>

    {{-- 5. Random Courses --}}
    <livewire:course.random-courses />
    {{-- <livewire:course.random-courses /> --}}

    <x-navigation.footer />
</x-layouts.app>
<x-layouts.app title="Center">
    {{-- 1. HERO SECTION - Detail Wrapper --}}
<x-course.detail
    :image="$course['image_thumbnail_url'] ?? 'https://placehold.co/1200x800?text=Course'"
    :title="$course['title']"
    :description="$course['description']"
    :rating="$course['rating'] ?? null"
    :tags="array_filter([
        ucfirst($course['type'] ?? null),
        $course['category']['name'] ?? null,
        $course['badge'] ? 'Featured' : null
    ])"
    :badge="$course['badge'] ?? null"
>

    {{-- STATS --}}
    <x-slot:interactionStats>
        <x-shared.resource-stats
            :commentsCount="$course['comments_count'] ?? 0"
            :viewsCount="$course['views_count'] ?? 0"
            :likesCount="$course['likes_count'] ?? 0"
            :sharesCount="$course['shares_count'] ?? 0"
            :timeElapsed="\Carbon\Carbon::parse(
                data_get($course, 'videos.0.created_at', $course['created_at'])
            )->diffForHumans()"
        />
    </x-slot>

    {{-- THUMBS --}}
    <x-slot:thumbs>
        {{-- @livewire('interaction-panel', [
            'resourceId' => $course['id'],
            'resourceType' => \App\Models\Course::class
        ]) --}}
    </x-slot>

    {{-- SHARE --}}
    <x-slot:share>
        <livewire:share-panel
            :resource-id="$course['id']"
            :resource-type="\App\Models\Course::class"
        />
        

    </x-slot>

    {{-- 👇 THIS IS THE ONLY DIFFERENCE --}}
    <x-slot:extra>
        <div class="space-y-4">
            @foreach ($course['centers'] as $center)
                <div class="flex items-center gap-4 p-4 border rounded-xl bg-gray-50">
                    <div class="w-12 h-12 bg-gray-200 rounded-lg"></div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900">
                            {{ $center['name'] }}
                        </h3>
                        <p class="text-xs text-gray-600">
                            {{ $center['city'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>

    {{-- FOOTER --}}
    <x-slot:footer>
        <div>
            <span class="text-2xl font-semibold text-blue-600">
                {{ $course['price_formatted'] }}
            </span>

            @if($course['registered_count'] > 0)
                <p class="text-xs text-gray-600 mt-1">
                    {{ $course['registered_count'] }} students enrolled
                </p>
            @endif
        </div>
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

        @if(session('user'))
        @if ($course['price_formatted'] === 'Free')
              <a
                href="{{ route('course.watch', $course['slug']) }}"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium"
            >
               Watch Now
            </a>
       @else
           <a
                href="{{ route('enroll.course', $course['slug']) }}"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium"
            >
                Enroll
            </a>
             @endif
        @else
            <a
                href="{{ route('logins') }}"
                class="px-6 py-2 border rounded-lg text-sm"
            >
                Login to Enroll
            </a>
        @endif
    </x-slot>

</x-course.detail>


 

    {{-- 3. Related Courses from Same Category --}}
    {{-- <livewire:course.related-courses 
        :categoryId="$course['category']['id']" 
        :currentCourseId="$course['id']"
    /> --}}

    {{-- 4. Comments Section --}}
    @livewire('comment-section', [
        'resourceId' => $course['id'],
        'resourceType' => 'App\Models\Course',
        'comment' => false,
    ])
 <livewire:course.random-courses />
    <x-navigation.footer />
</x-layouts.app>
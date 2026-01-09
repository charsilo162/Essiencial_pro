<x-layouts.app title="{{ $center->name }} | Training Center">

    <x-navigation.header-centered />

    {{-- 1. Hero Section (Center Detail Wrapper) --}}
    <x-shared.detail-wrapper 
        :imageUrl="$center->center_thumbnail_url ?? 'https://placehold.co/1200x800/10b981/ffffff?text=Center+Image'"
        :title="$center->name"
        :description="$center->address . ', ' . ($center->city ?? 'City not specified')"
        :rating="$center->rating ?? 4.7"
        :tagLabels="['Training Center', $course->type === 'hybrid' ? 'Hybrid' : 'Physical']"
        badgeText="{{ $course->title ?? 'Course' }}"
    >
         <x-slot:shareBlock>
        <div class="mt-6">
            <livewire:share-panel 
                :resource-id="$course->id" 
                :resource-type="\App\Models\Course::class" 
            />
        </div>
    </x-slot:shareBlock>
        {{-- Likes / Comments / Shares Panel --}}
        <x-slot:thumbsBlock>
            @livewire('interaction-panel', [
                'resourceId' => $course->id, 
                'resourceType' => 'App\Models\Course' 
            ])
        </x-slot:thumbsBlock>

        {{-- Interaction Stats --}}
        <x-slot:interactionStats>
            <x-shared.resource-stats 
                :commentsCount="$course->comments_count" 
                :viewsCount="$course->views_count ?? 1250"
                :likesCount="$course->likes_count" 
                :sharesCount="$course->shares_count ?? 50"
                timeElapsed="{{ $course->created_at->diffForHumans() ?? '2 weeks ago' }}"
            />
        </x-slot:interactionStats>

        {{-- Contact Area (Now shows CENTER details instead of tutor) --}}
        <x-slot:contactArea>
            <div class="mb-4 p-4 border rounded-lg bg-gray-50">
                <div class="flex items-center mb-4">
                    <img class="w-12 h-12 rounded-full mr-3 object-cover" 
                         src="{{ $center->center_thumbnail_url ?? 'https://via.placeholder.com/40' }}" 
                         alt="{{ $center->name }}">
                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Training Center: {{ $center->name }}
                        </h3>
                        <p class="text-xs text-gray-500">
                            {{ $center->address ?? 'Address not available' }}<br>
                            {{ $center->city ?? '' }}
                        </p>
                    </div>
                </div>

                <div class="text-sm text-gray-600">
                    <p><strong>Course:</strong> {{ $course->title }}</p>
                    @if ($center->pivot)
                        <p><strong>Start Date:</strong> {{ $center->pivot->start_date ?? 'TBA' }}</p>
                        <p><strong>End Date:</strong> {{ $center->pivot->end_date ?? 'TBA' }}</p>
                        <p><strong>Price:</strong> ₦{{ number_format($center->pivot->price ?? 0, 2) }}</p>
                    @endif
                </div>
            </div>
        </x-slot:contactArea>

        {{-- Footer Area (Enroll or Visit Center Button) --}}
        <x-slot:footerArea>
            <div class="flex items-center justify-between">
                <span class="text-2xl font-extrabold text-emerald-600">
                    ₦{{ number_format($center->pivot->price ?? 0, 2) }}
                </span>
                <a href="{{ route('enroll.course', $course->id) }}" 
                   class="bg-emerald-600 text-white py-3 px-8 text-lg font-semibold rounded-xl hover:bg-emerald-700 transition-colors shadow-lg">
                    Enroll at Center
                </a>
            </div>
        </x-slot:footerArea>
    </x-shared.detail-wrapper>

    {{-- 2. About Section (Now uses center description) --}}
    <x-shared.content-description title="About {{ $center->name }}">
        <p>
            {{ $center->description ?? 'This center offers hands-on practical sessions designed to give students real-world experience. Our facilities include modern classrooms, lab spaces, and professional equipment.' }}
        </p>
        <p class="mt-4">
            {{ $center->mission ?? 'Our mission is to provide high-quality training to prepare students for the workforce and professional certifications.' }}
        </p>
        <p class="mt-4">
            {{ $center->extra_info ?? 'Join this center to experience interactive sessions, mentorship, and career support.' }}
        </p>
    </x-shared.content-description>

    {{-- 3. Course List for the Same Center --}}
    <div class="mt-8">
        <livewire:course.course-list 
            :centerId="$center->id"
            :usePagination="false"
        />
    </div>
  @livewire('comment-section', [
        'resourceId' => $center->id, 
        'resourceType' => 'App\Models\Center' 
    ])
    <livewire:course.related-courses-by-center 
    :centerId="$center->id" 
/>
    <x-navigation.footer />
</x-layouts.app>

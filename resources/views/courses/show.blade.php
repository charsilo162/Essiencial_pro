<x-layouts.home-layout>
 {{-- <x-navigation.header-original /> --}}
  {{-- <x-layouts.dashboardheader /> --}}

    {{-- 1. Hero Section --}}
    <x-shared.detail-wrapper 
        :imageUrl="$course['image_thumbnail_url'] ?? ''"
        :title="$course['title']"
        :description="$course['description']"
        :rating="$course['rating'] ?? 4.5"
        :tagLabels="$course['tags'] ?? ['Beginner', 'Programming']"
        badgeText="{{ $course['category']['name'] ?? 'Category' }}"
        >
        <x-slot:thumbsBlock>
            @livewire('interaction-panel', [
                'resourceId' => $course['id'],
                'resourceType' => 'App\\Models\\Course'
            ])
        </x-slot:thumbsBlock>

        <x-slot:shareBlock>
            <div class="mt-6">
                <livewire:share-panel 
                    :resource-id="$course['id']"
                    :resource-type="'App\\Models\\Course'"
                />
            </div>
        </x-slot:shareBlock>

        <x-slot:interactionStats>
            <x-shared.resource-stats 
                :commentsCount="$course['comments_count'] ?? 0"
                :viewsCount="$course['views_count'] ?? 1250"
                :likesCount="$course['likes_count'] ?? 0"
                :sharesCount="$course['shares_count'] ?? 50"
                timeElapsed="{{ $course['created_at'] ?? '2 weeks ago' }}"
            />
        </x-slot:interactionStats>

        <x-slot:contactArea>
            <div class="mb-4 p-4 border rounded-lg bg-gray-50">
                @if (!empty($course['assigned_tutor']))
                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 rounded-full mr-3 object-cover" 
                             src="{{ $course['assigned_tutor']['user']['profile_photo_url'] ?? 'https://via.placeholder.com/40' }}" 
                             alt="{{ $course['assigned_tutor']['user']['name'] ?? 'Instructor' }}">
                        <div>
                            <h3 class="font-semibold text-gray-800">
                                Primary Instructor: {{ $course['assigned_tutor']['user']['name'] ?? 'Unknown' }}
                            </h3>
                            <p class="text-xs text-gray-500">
                                Certified instructor with {{ $course['assigned_tutor']['experience_years'] ?? 'many' }} years experience.
                            </p>
                        </div>
                    </div>
                @else
                    <h3 class="font-semibold text-gray-800">Taught by: <span class="text-gray-500">Platform Instructor</span></h3>
                @endif
            </div>
        </x-slot:contactArea>

       <x-slot:footerArea>
        <div class="flex items-center justify-between">
        <span class="text-3xl font-extrabold text-blue-600">
            ${{ number_format($course['current_price']['amount'] ?? 99.00, 2) }}
        </span>
            {{-- {{ session('user') ? 'Send' : 'Login to Comment' }} --}}
              @if (session('user'))
        <a href="{{ route('enroll.course', $course['slug']) }}" 
           class="bg-blue-600 text-white py-3 px-8 text-lg font-semibold rounded-xl hover:bg-blue-700 transition-colors shadow-lg">
            Enroll Now
        </a>
        @endif
        @if (session('success'))
        <div x-data="{ show: true }" x-show="show"
            class="mb-4 flex items-start justify-between rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="font-bold">×</button>
        </div>
        @endif
        @if (session('error'))
        <div x-data="{ show: true }" x-show="show"
            class="mb-4 flex items-start justify-between rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">
            <span>{{ session('error') }}</span>
            <button @click="show = false" class="font-bold">×</button>
        </div>
        @endif
     </div>
        </x-slot:footerArea>
    </x-shared.detail-wrapper>
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
{{-- <livewire:comment-section --}}

 {{-- :resourceId = "$course['id']"
  :resourceType = "App\\Models\\Course"
/> --}}
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
    {{-- <livewire:course.random-courses /> --}}


</x-layouts.home-layout>
<x-layouts.home-layout>
      

    {{-- 1. HERO SECTION - Detail Wrapper --}}
   <x-shared.detail-wrapper 
    :imageUrl="$course['image_thumbnail_url'] ?? 'https://placehold.co/1200x800/orange/white?text=Course'"
    :title="$course['title']"
    :description="$course['description']"
    :rating="$course['rating'] ?? 4.5"
    :tagLabels="array_filter([
        ucfirst($course['type'] ?? 'online'),
        $course['category']['name'] ?? 'Uncategorized',
        $course['badge'] ? 'Featured' : null
    ])"
    :badgeText="$course['badge'] ?? null"
>

        {{-- Share Panel --}}
          @if (session('user'))
        <x-slot:shareBlock>
            <div class="mt-6">
              
                   <livewire:share-panel 
                    :resource-id="$course['id']" 
                    :resource-type="\App\Models\Course::class" 
                />  
              </div>
        </x-slot:shareBlock>
            @endif
        {{-- Likes / Dislikes / Comments --}}
         @if (session('user'))
        <x-slot:thumbsBlock>
            @livewire('interaction-panel', [
                'resourceId' => $course['id'],
                'resourceType' => 'App\Models\Course'
            ])
        </x-slot:thumbsBlock>
 @endif
        {{-- Interaction Stats --}}
        <x-slot:interactionStats>
            <x-shared.resource-stats 
                :commentsCount="$course['comments_count']"
                :viewsCount="$course['views_count'] ?? 0"
                :likesCount="$course['likes_count']"
                :sharesCount="$course['shares_count'] ?? 0"
                :timeElapsed="\Carbon\Carbon::parse($course['videos'][0]['created_at'] ?? now())->diffForHumans()"
            />
        </x-slot:interactionStats>

        {{-- Contact / Center Info --}}
        <x-slot:contactArea>
            {{-- <div class="space-y-6"> --}}
                {{-- @foreach ($course['centers'] as $center) --}}

                {{-- @php
                  dd($course['centers']);  
                @endphp --}}
                    {{-- <div class="p-5 bg-gradient-to-r from-orange-50 to-pink-50 rounded-2xl border-2 border-orange-200/50">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 bg-gray-200 border-2 border-dashed rounded-xl"></div>
                            <div>
                                <h3 class="font-bold text-lg text-blue-900">
                                   Center Name: {{ $center['name'] }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                   Address:  {{ $center['city'] }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm space-y-1 text-gray-700">
                            <p><strong>Course Price:</strong> {{ $course['price_formatted'] }}</p>
                            <p><strong>Type:</strong> {{ ucfirst($course['type']) }} Course</p>
                            @if($course['badge'])
                                <span class="inline-block mt-2 px-4 py-1 bg-gradient-to-r from-orange-500 to-pink-500 text-white text-xs font-bold rounded-full">
                                    {{ $course['badge'] }}
                                </span>
                            @endif
                        </div>
                    </div> --}}
                {{-- @endforeach --}}
            {{-- </div> --}}
        </x-slot:contactArea>

        {{-- Footer: Price + Enroll Button --}}
        <x-slot:footerArea>
            <div class="flex items-center justify-between flex-wrap gap-6">
                <div>
                    <span class="text-4xl font-extrabold bg-gradient-to-r from-orange-600 to-pink-600 bg-clip-text text-transparent">
                        {{ $course['price_formatted'] }}
                    </span>
                    @if($course['registered_count'] > 0)
                        <p class="text-sm text-gray-600 mt-1">
                            {{ $course['registered_count'] }} students enrolled
                        </p>
                    @endif
                </div>
            @if (session('user'))
               <a href="{{ route('enroll.course', $course['slug']) }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white text-sm font-semibold rounded-xl transition">
                    Enroll Now
                    </a>

                @else
                <a href="{{ route('logins') }}"
                class="inline-flex items-center justify-center px-5 py-3 bg-gray-900 hover:bg-gray-800 text-white text-sm font-semibold rounded-xl transition">
                Login to Enroll
                </a>

                @endif
            </div>
        </x-slot:footerArea>
    </x-shared.detail-wrapper>
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

   

    {{-- 3. Related Courses from Same Category --}}
    {{-- <livewire:course.related-courses 
        :categoryId="$course['category']['id']" 
        :currentCourseId="$course['id']"
    /> --}}

    {{-- 4. Comments Section --}}
    @livewire('comment-section', [
        'resourceId' => $course['id'],
        'resourceType' => 'App\Models\Course'
    ])

    
    </x-layouts.home-layout>
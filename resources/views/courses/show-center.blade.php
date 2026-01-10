<x-layouts.app title="Center">
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
        <x-slot:shareBlock>
            <div class="mt-6">
                <livewire:share-panel 
                    :resource-id="$course['id']" 
                    :resource-type="\App\Models\Course::class" 
                />
            </div>
        </x-slot:shareBlock>

        {{-- Likes / Dislikes / Comments --}}
        <x-slot:thumbsBlock>
            @livewire('interaction-panel', [
                'resourceId' => $course['id'],
                'resourceType' => 'App\Models\Course'
            ])
        </x-slot:thumbsBlock>

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
            <div class="space-y-6">
                @foreach ($course['centers'] as $center)
                    <div class="p-5 bg-gradient-to-r from-orange-50 to-pink-50 rounded-2xl border-2 border-orange-200/50">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 bg-gray-200 border-2 border-dashed rounded-xl"></div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900">
                                    {{ $center['name'] }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ $center['city'] }}
                                </p>
                            </div>
                        </div>
                       
                    </div>
                @endforeach
            </div>
        </x-slot:contactArea>

        {{-- Footer: Price + Enroll Button --}}
        <x-slot:footerArea>
            <div class="flex items-center justify-between flex-wrap gap-6">
                <div>
                 <span class="text-4xl font-extrabold text-blue-600">
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
                            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-full inline-block">

                    <span class="relative z-10">Enroll Now</span>
                    <span class="relative z-10">🚀</span>
                </a>

                    @else
            <a href="{{ route('logins') }}"
            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-full inline-block">
            Login to Enroll
            </a>


                @endif
            </div>
        </x-slot:footerArea>
    </x-shared.detail-wrapper>


 

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

    <x-navigation.footer />
</x-layouts.app>
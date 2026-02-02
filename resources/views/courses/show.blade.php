<x-layouts.app title="Course Details">

    {{-- Floating Alert System --}}
  {{-- Floating Alert System --}}
@if (!empty($success) || !empty($error) || session('error') || session('success'))
    <div 
        x-data="{ 
            show: true, 
            init() { setTimeout(() => this.show = false, 5000) } 
        }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-20px]" {{-- Slides down from top --}}
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        {{-- Increased z-index to 9999 and added pointer-events-none --}}
        class="fixed top-10 right-5 z-[9999] max-w-sm w-full pointer-events-none"
    >
        @php
            $msg = $success ?? session('success');
            $err = $error ?? session('error');
        @endphp

        <div class="{{ $err ? 'bg-red-600' : 'bg-green-600' }} text-white rounded-xl p-4 flex items-start gap-4 shadow-[0_10px_40px_rgba(0,0,0,0.3)] pointer-events-auto">
            <div class="flex-shrink-0 text-xl">
                {{ $err ? '⚠️' : '✅' }}
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold">
                    {{ $err ? 'Attention' : 'Success' }}
                </p>
                <p class="text-sm opacity-90">
                    {{ $err ?: $msg }}
                </p>
            </div>
            <button @click="show = false" class="text-white hover:rotate-90 transition-transform duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif

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
            {{-- Interaction Panel Placeholder --}}
        </x-slot>

        <x-slot:share>
            <livewire:share-panel
                :resource-id="$course['id']"
                :resource-type="\App\Models\Course::class"
            />
        </x-slot>

        <x-slot:footer>
            <div class="flex items-center justify-between w-full">
                <div>
                    <span class="text-2xl font-semibold text-blue-600">
                        {{ $course['price_formatted'] ?? '$99.00' }}
                    </span>
                </div>

                <div class="flex items-center gap-3">
                    @if(session('user'))
                        <a href="{{ route('enroll.course', $course['slug']) }}"
                           class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition shadow-lg shadow-blue-200">
                            Enroll Now
                        </a>
                    @else
                        <a href="{{ route('logins') }}"
                           class="px-6 py-2 border border-zinc-300 hover:bg-zinc-50 rounded-lg text-sm transition">
                            Login to Enroll
                        </a>
                    @endif
                </div>
            </div>
        </x-slot>

        <x-slot:extra>
            {{-- instructor OR center info --}}
        </x-slot>
    </x-course.detail>

    {{-- 2. Course Description --}}
    <x-shared.content-description title="About This Course">
        <div class="prose prose-blue max-w-none text-zinc-600">
            <p>{{ $course['long_description_p1'] ?? 'Detailed course content coming soon...' }}</p>
            @if(!empty($course['long_description_p2'])) <p class="mt-4">{{ $course['long_description_p2'] }}</p> @endif
            @if(!empty($course['long_description_p3'])) <p class="mt-4">{{ $course['long_description_p3'] }}</p> @endif
        </div>
    </x-shared.content-description>

    {{-- 3. Comments --}}
    <div class="mt-12 bg-zinc-50 rounded-2xl p-6 lg:p-10">
        @livewire('comment-section', [
            'resourceId' => $course['id'],
            'resourceType' => 'App\\Models\\Course',
            'comment' => false,
        ])
    </div>

    {{-- 4. Related Courses by Tutor --}}
    <div class="mt-20">
        <h3 class="text-xl font-bold mb-8 text-center">More from this Instructor</h3>
        <livewire:course.course-list 
            :tutorId="$course['assigned_tutor_id'] ?? null"
            :usePagination="false"
        />
    </div>

    {{-- 5. Random Courses --}}
    <div class="mt-20 border-t pt-12">
        <h3 class="text-xl font-bold mb-8 text-center">Recommended For You</h3>
        <livewire:course.random-courses />
    </div>

    <x-navigation.footer />
</x-layouts.app>
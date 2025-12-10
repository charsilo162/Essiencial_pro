<div>
    <!-- Search Box -->
    <div class="mb-6">
        <div class="relative max-w-md mx-auto">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search"
                wire:keydown.enter.prevent
                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl 
                       focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent
                       shadow-sm text-gray-900 placeholder-gray-500
                       transition duration-200"
                placeholder="Search your courses by title..."
                autocomplete="off"
            >
            <!-- Clear button when search has value -->
            @if($search)
                <button 
                    wire:click="$set('search', '')"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            @endif
        </div>

        <!-- Search results count -->
        @if($search)
            <div class="mt-2 text-center text-sm text-gray-600">
                Searching for: <span class="font-semibold text-orange-600">"{{ $search }}"</span>
                <span class="ml-2">
                    ({{ $courses->total() }} {{ Str::plural('result', $courses->total()) }})
                </span>
            </div>
        @endif
    </div>

    <!-- Courses Grid -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
        @forelse ($courses as $course)
            <div class="relative bg-gradient-to-br from-orange-50 via-yellow-50 to-blue-50 border-2 border-transparent rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition group ring-1 ring-offset-2 ring-orange-300 hover:ring-yellow-400">
                <!-- Thumbnail -->
                <div class="relative">
                    <img src="{{ $course['image_thumbnail_url'] ?? asset('storage/default_course.png') }}"
                         alt="{{ $course['title'] }} thumbnail" class="h-32 w-full object-cover">
                    <!-- Action Buttons -->
                    <div class="absolute top-2 right-2 flex space-x-1 opacity-0 group-hover:opacity-100 transition">
                        <!-- Edit Button -->
                        <button
                        wire:click="$dispatch('openEditCourseModal', {{ json_encode([$course['id']]) }})"
                            {{-- wire:click="$dispatch('openEditCourseModal', [{{ $course['id'] }])]" --}}
                            class="bg-white p-1 rounded-full shadow hover:bg-gray-100"
                            title="Edit Course">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l2.586 2.586a1 1 0 010 1.414L13 17H9v-4z" />
                            </svg>
                        </button>
                        <!-- Delete Button -->
                        <button
                            class="bg-white p-1 rounded-full shadow hover:bg-gray-100"
                            title="Delete Course">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Body -->
                <div class="p-3">
                    <h3 class="text-md font-semibold text-gray-800 flex items-center gap-2" title="{{ $course['title'] }}">
                        {{ Str::limit($course['title'], 40) }}
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                            {{ $course['publish'] ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                            {{ $course['publish'] ? 'Live' : 'Draft' }}
                        </span>
                    </h3>
                    <div class="mt-4 flex items-center justify-between">
                        <button
                            wire:click="togglePublish({{ $course['id'] }})"
                            wire:loading.attr="disabled"
                            class="px-3 py-1 text-xs font-medium rounded-full transition whitespace-nowrap
                            {{ $course['publish'] ? 'bg-red-100 text-red-700 hover:bg-red-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }}"
                            title="{{ $course['publish'] ? 'Click to unpublish' : 'Click to publish' }}">
                            <span wire:loading.remove wire:target="togglePublish({{ $course['id'] }})">
                                {{ $course['publish'] ? 'Unpublish' : 'Publish' }}
                            </span>
                            <span wire:loading wire:target="togglePublish({{ $course['id'] }})">...</span>
                        </button>
                        <span class="text-gray-900 font-bold text-md">
                            {{ $course['price_formatted'] ?? 'Free' }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                @if($search)
                    <p class="text-gray-500 text-lg">No courses found matching "<strong>{{ $search }}</strong>".</p>
                @else
                    <p class="text-gray-500 text-lg">You haven't posted any courses yet.</p>
                    <div class="mt-4">
                        <livewire:course.post-course-button />
                    </div>
                @endif
            </div>
        @endforelse
    </div>

    <!-- Pagination Links -->
    @if($courses->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $courses->onEachSide(1)->links() }}
        </div>
    @endif
</div>
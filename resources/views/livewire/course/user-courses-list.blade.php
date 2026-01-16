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
<div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @forelse ($courses as $course)
        <div class="relative flex flex-col bg-gradient-to-br from-orange-50 via-yellow-50 to-blue-50
                    rounded-2xl border border-orange-200 shadow-sm
                    hover:shadow-lg transition group overflow-hidden">

            <div class="relative h-48 w-full overflow-hidden bg-black">
                <img
                    src="{{ $course['image_thumbnail_url'] ?? asset('storage/default_course.png') }}"
                    alt="{{ $course['title'] }}"
                    class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-300">

                <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity z-10">
                    <button
                        wire:click="$dispatch('openEditCourseModal', { courseId: {{ $course['id'] }} })"
                        class="bg-white/90 backdrop-blur p-2 rounded-full shadow hover:bg-white text-gray-700">
                        ✏️
                    </button>

                    <button
                        wire:click="confirmDelete({{ $course['id'] }})"
                        class="bg-white/90 backdrop-blur p-2 rounded-full shadow hover:bg-red-50 text-red-600">
                        🗑️
                    </button>
                </div>
            </div>

            <div class="flex flex-col flex-1 p-4">
                <div class="mb-3">
                    <h3 class="text-sm font-bold text-gray-800 leading-tight line-clamp-2 h-10"
                        title="{{ $course['title'] }}">
                        {{ $course['title'] }}
                    </h3>

                    <span class="mt-2 inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                        {{ $course['publish'] ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                        {{ $course['publish'] ? 'Live' : 'Draft' }}
                    </span>
                </div>

                <div class="flex-1"></div>

                <div class="pt-3 border-t border-orange-100 mt-auto">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <button
                            wire:click="togglePublish({{ $course['id'] }})"
                            wire:loading.attr="disabled"
                            class="whitespace-nowrap px-3 py-1.5 text-[10px] sm:text-[11px] font-bold rounded-lg transition-colors min-w-[80px]
                            {{ $course['publish']
                                ? 'bg-red-50 text-red-600 hover:bg-red-100'
                                : 'bg-green-50 text-green-600 hover:bg-green-100' }}">
                            
                            <span wire:loading wire:target="togglePublish({{ $course['id'] }})" class="mr-1">...</span>
                            {{ $course['publish'] ? 'Unpublish' : 'Publish' }}
                        </button>

                        <span class="text-gray-900 font-extrabold text-xs sm:text-sm whitespace-nowrap ml-auto">
                            {{ $course['price_formatted'] ?? 'Free' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
            <div class="text-4xl mb-3">📚</div>
            <p>No courses found matching your criteria.</p>
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
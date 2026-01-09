<div class="enrolled-courses-section p-4">
    <h2 class="text-2xl font-bold mb-6">📚 Your Enrolled Courses</h2>

    {{-- Search Filter and Pagination Control --}}
    <div class="flex justify-end mb-6">
        <input 
            type="search"
            wire:model.live.debounce.300ms="search" {{-- Livewire binding for search, with a debounce for performance --}}
            placeholder="Search by title or description..."
            class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        >
    </div>
    
    @if($courses->isEmpty() && empty($search))
        {{-- Show this if no courses are enrolled AND no search is active --}}
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
            <p class="font-bold">No Courses Enrolled</p>
            <p>It looks like you haven't enrolled in any courses yet. Start learning today!</p>
        </div>
    @elseif($courses->isEmpty() && !empty($search))
        {{-- Show this if no results are found during a search --}}
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
            <p class="font-bold">No Results Found</p>
            <p>Your search for "**{{ $search }}**" did not match any enrolled courses.</p>
        </div>
    @else
        {{-- Course Grid (3 columns per row) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                {{-- Course Card (Same as before) --}}
                <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100 transform hover:shadow-xl transition duration-300">
                    
                    {{-- Video Thumbnail / Image --}}
                    <div class="relative h-48 bg-gray-200">
                        <img src="{{ $course['image_thumbnail_url'] ?? asset('images/default-course-thumb.jpg') }}" 
                             alt="{{ $course['title'] }} Thumbnail" 
                             class="w-full h-full object-cover">
                    </div>

                    <div class="p-5">
                        {{-- Course Title --}}
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 truncate" title="{{ $course['title'] }}">
                            {{ $course['title'] }}
                        </h3>

                        {{-- "Part 2" (Video Index/Explore) --}}
                        @php
                            $firstVideo = $this->getFirstCourseVideo($course);
                            // Assuming 'order_index' is 0-based, so add 1 for display
                            $videoIndex = $firstVideo ? ($firstVideo['pivot']['order_index'] ?? 0) + 1 : 1; 
                        @endphp

                        <p class="text-sm text-gray-500 mb-4">
                            Video Part: <span class="font-medium text-indigo-600">Part {{ $videoIndex }}</span>
                        </p>

                        {{-- "Watch Now" Link --}}
                        <a href="{{ route('course.watch', ['slug' => $course['slug']]) }}" 
                           class="inline-block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                            ▶️ Watch Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination Links --}}
        <div class="mt-6">
            {{ $courses->links() }}
        </div>
    @endif
</div>
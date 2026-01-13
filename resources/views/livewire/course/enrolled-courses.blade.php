<div class="enrolled-courses-section p-8 min-h-screen 
             bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]">

    <h2 class="text-3xl font-extrabold mb-10 text-white tracking-wide drop-shadow">
        📚 Your Enrolled Courses
    </h2>

    {{-- Search Bar --}}
    <div class="flex justify-end mb-10">
        <div class="relative w-full md:w-1/3">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-300">
                🔍
            </span>
            <input 
                type="search"
                wire:model.live.debounce.300ms="search"
                placeholder="Search enrolled courses..."
                class="w-full pl-10 pr-4 py-3 bg-white/20 backdrop-blur-lg text-white 
                       placeholder-gray-300 shadow-md rounded-xl border border-white/30 
                       focus:ring-2 focus:ring-yellow-300 focus:border-yellow-300 
                       transition-all duration-300"
            >
        </div>
    </div>


    {{-- Empty States --}}
    @if($courses->isEmpty() && empty($search))
        <div class="bg-white/20 border-l-4 border-yellow-300 text-white p-6 
                    rounded-lg shadow-lg backdrop-blur-md">
            <p class="font-bold text-lg">No Courses Enrolled</p>
            <p class="text-sm mt-1">Start learning today!</p>
        </div>

    @elseif($courses->isEmpty() && !empty($search))
        <div class="bg-white/20 border-l-4 border-red-400 text-white p-6 
                    rounded-lg shadow-lg backdrop-blur-md">
            <p class="font-bold text-lg">No Results Found</p>
            <p class="text-sm mt-1">Nothing found for "<strong>{{ $search }}</strong>".</p>
        </div>

    @else

        {{-- Course Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($courses as $course)
                
                <div class="bg-white/10 backdrop-blur-xl rounded-2xl overflow-hidden 
                            shadow-xl hover:shadow-2xl 
                            border border-white/20 hover:border-yellow-400 
                            hover:-translate-y-2 transition-all duration-300">

                    {{-- Border Glow Around Card --}}
                    <div class="rounded-2xl p-[1px] bg-gradient-to-br 
                                from-yellow-300/40 via-white/10 to-yellow-600/30">
                        
                        <div class="bg-white/10 backdrop-blur-xl rounded-2xl overflow-hidden">

                            {{-- Thumbnail --}}
                            <div class="relative h-48">
                                <img 
                                    src="{{ $course['image_thumbnail_url'] ?? asset('images/default-course-thumb.jpg') }}"
                                    alt="{{ $course['title'] }}"
                                    class="w-full h-full object-cover"
                                >
                            </div>

                            <div class="p-6">

                                {{-- Title --}}
                                <h3 class="text-lg font-bold text-white mb-3 line-clamp-1">
                                    {{ $course['title'] }}
                                </h3>

                                {{-- Video Part --}}
                                @php
                                    $firstVideo = $this->getFirstCourseVideo($course);
                                    $videoIndex = $firstVideo 
                                        ? ($firstVideo['pivot']['order_index'] ?? 0) + 1 
                                        : 1;
                                @endphp

                                <p class="text-sm text-gray-200 mb-4">
                                    Video Part: 
                                    <span class="font-semibold text-yellow-300">
                                        Part {{ $videoIndex }}
                                    </span>
                                </p>

                                {{-- Watch Button --}}
                                <a 
                                    href="{{ route('course.watch', ['slug' => $course['slug']]) }}"
                                    class="block w-full text-center bg-yellow-400 hover:bg-yellow-500 
                                           text-black font-bold py-2.5 rounded-xl 
                                           transition-all duration-300 shadow-md hover:shadow-xl"
                                >
                                    ▶️ Watch Now
                                </a>

                            </div>
                        </div>
                    </div>

                </div>

            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10 text-white">
            {{ $courses->links() }}
        </div>

    @endif
</div>

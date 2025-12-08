@props(['course'])

{{-- The link should point to the course detail page --}}
{{-- Assuming you have a route named 'courses.show' that takes a course slug or ID --}}
<a href="{{ route('courses.show', $course->slug ?? $course->id) }}" 
    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition w-full block">
    
    <img 
        class="w-full h-56 object-cover rounded-t-xl overflow-hidden" 
        src="{{ $course->image_url ?? asset('storage/course-default.png') }}" 
        alt="{{ $course->name }} Course Image" 
    />

    <div class="p-5">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $course->name }}</h3>
            
            {{-- Price/Enrollment/Duration Placeholder --}}
            <span class="ml-2 text-md font-bold text-indigo-600">
                {{-- Example: Display price if available, otherwise display "Free" or "View" --}}
                @if ($course->price > 0)
                    ${{ number_format($course->price, 0) }} 
                @else
                    FREE
                @endif
            </span>
        </div>

        {{-- Course Category and Duration/Description --}}
        <p class="mt-2 text-sm text-gray-600">
            {{ $course->category->name ?? 'Uncategorized' }}
            <span class="ml-3 text-xs text-gray-500">
                (Duration: {{ $course->duration ?? 'N/A' }})
            </span>
        </p>

        {{-- Center Name (The provider of the course) --}}
        <div class="flex items-center mt-2 text-sm text-gray-500 truncate">
            <svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                {{-- Building Icon --}}
                <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-2-7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm4 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm-4-8a1 1 0 0 0 0 2h4a1 1 0 0 0 0-2H8z" />
            </svg>
            {{-- Since a course can have many centers, you might show the first one or a count --}}
            {{ $course->centers->first()->name ?? 'Multiple Providers' }}
        </div>

        {{-- Skills/Tags (optional) --}}
        <div class="mt-3 flex flex-wrap gap-2">
            @forelse ($course->skills->take(3) ?? [] as $skill)
                <span class="px-3 py-1 text-xs font-medium bg-indigo-100 rounded-full text-indigo-700">
                    {{ \Illuminate\Support\Str::limit($skill->name, 10, '...') }}
                </span>
            @empty
                <span class="px-3 py-1 text-xs font-medium text-gray-500">No tags</span>
            @endforelse
        </div>
    </div>
</a>
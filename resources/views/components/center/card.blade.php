@props(['center'])
{{-- <a href="{{ route('centers.show', $center->slug) }}"  --}}
<a href="{{ route('center.show', $center['id']) }}" 
   class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition w-full block">
    {{-- @php
        dd($center);
    @endphp --}}
    {{-- <img 
        class="w-full h-56 object-cover rounded-b-xl overflow-hidden" 
        src="{{ $center['image_url'] ?? asset('storage/img2.png') }}"  --}}
        {{-- src="{{asset('storage/img1.png') }}" 
        alt="{{ $center['name'] }} Training Center" 
    /> --}}
<img 
    src="{{ $center['image_url'] 
        ? $center['image_url']
        : asset('storage/img1.png') }}" 
    alt="{{ $center['name'] }} Training Center"
    class="w-full h-56 object-cover rounded-b-xl overflow-hidden" 
/>

    <div class="p-5">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $center['name'] }}</h3>
            
            {{-- Static Rating (as requested) --}}
            <div class="flex items-center">
                <div class="flex space-x-0.5">
                    {{-- Render stars based on a static 4.34 rating for now --}}
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.122-6.545L.489 6.91l6.561-.955L10 0l2.95 5.955 6.561.955-4.755 4.635 1.122 6.545z"/>
                        </svg>
                    @endfor
                </div>
                <span class="ml-2 text-sm text-gray-600">4.34</span>
            </div>
        </div>

        <p class="mt-2 text-sm text-gray-600">{{ $center['years_of_experience'] }} years experience</p>

        <div class="flex items-center mt-2 text-sm text-gray-500 truncate">
            <svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.05 3.636a7 7 0 119.9 9.9l-4.243 4.243a1 1 0 01-1.414 0L5.05 13.536a7 7 0 010-9.9zm4.95-.636a5 5 0 100 10 5 5 0 000-10z" clip-rule="evenodd"/>
            </svg>
            {{ $center['address'] }}
        </div>

        <div class="mt-3 flex flex-wrap gap-2">
        @forelse ($center['latest_courses'] ?? [] as $course)                <span class="px-3 py-1 text-xs font-medium bg-gray-100 rounded-full text-gray-700">
                    {{-- {{ $course->category->name ?? 'Uncategorized' }} --}}
                {{ \Illuminate\Support\Str::limit($course['category_name'], 15, '...') }}                </span>
            @empty
                <span class="px-3 py-1 text-xs font-medium text-gray-500">No recent courses</span>
            @endforelse
        </div>
    </div>
</a>
@props(['category'])

<a 
    {{-- href="{{ route('categories.show', $category->slug) }}"  --}}
 href="{{ route('category.show', $category['slug']) }}" 
    class="block bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden border border-gray-100"
>
    {{-- Image --}}
     {{--<img 
        src="{{ $category->thumbnail_url ?? asset('storage/img3.png') }}"  --}}
        {{-- src="{{ $category['thumbnail_url'] ?? asset('storage/img3.png') }}"  --}}
        {{-- src="{{  asset('storage/img3.png') }}" 
        alt="{{ $category['name'] }}" 
        class="h-28 w-full object-cover"
    > --}}
    <img 
            src="{{ $category['thumbnail_url'] 
                ? $category['thumbnail_url']
                : asset('storage/img3.png') }}" 
            alt="{{ $category['name'] }}  category"
        class="h-28 w-full object-cover"
        />
    <div class="p-2 text-center">
        <h3 class="text-sm font-semibold text-gray-900 truncate">{{ $category['name'] }}</h3>
        {{-- Course Count (Assumes 'courses_count' is loaded) --}}
        <p class="text-xs text-gray-500">({{ number_format($category['courses_count']) }} Courses)</p>
    </div>
</a>
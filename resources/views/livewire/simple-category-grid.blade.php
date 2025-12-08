<div class="category-top-section max-w-7xl mx-auto px-4 mt-8">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse ($categories as $category)
            {{-- <a href="{{ route('categories.show', $category['slug']) }}"  --}}
               {{-- class="bg-white text-gray-900 rounded-lg shadow hover:shadow-md p-4 text-center transition"> --}}
                <h3 class="text-sm font-semibold">
                    {{ $category['name'] }} 
                    <span class="text-gray-500">({{ number_format($category['courses_count']) }})</span>
                </h3>
            {{-- </a> --}}
        @empty
            <p class="col-span-full text-center text-gray-500 py-8">
                No categories found matching "{{ $search }}".
            </p>
        @endforelse
    </div>

    @if (empty($search) && $categories->count() >= $this->limit)
        <div class="text-center mt-8">
            <a 
                href="{{ route('category.index') }}" 
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                See All {{ number_format($totalCategoryCount) }} Categories
                <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    @endif
</div>
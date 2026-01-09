<!-- TOP CATEGORIES HEADER + SEARCH (integrated with dynamic scrolling cards) -->
<div>
<section class="px-6 mt-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                Top Categories
            </h2>
            <p class="text-sm text-gray-500">
                Explore essential skills curated for your success
            </p>
        </div>

        <!-- Search box (wired to Livewire) -->
        <div class="flex items-center bg-white rounded-full overflow-hidden shadow-md w-full md:w-80 border border-gray-200">
            <input 
                type="text"
                placeholder="Search categories..."
                class="flex-1 px-5 py-3 outline-none text-gray-700 text-sm"
                wire:model.live.debounce.500ms="search" 
            />
            <button class="bg-blue-600 text-white px-6 py-3 font-semibold text-sm">
                Search
            </button>
        </div>

    </div>
</section>

<section class="px-6 py-10 bg-gray-50">
    <div class="flex items-center gap-6 overflow-x-auto pb-3">

        <!-- Dynamic Card items -->
        @forelse($categories as $category)
        {{-- @php
            dd($category);
        @endphp --}}
        <a href="{{ route('category.show', $category['slug']) }}" >
            <div class="min-w-[180px] bg-white rounded-2xl shadow-md overflow-hidden">
                @if(isset($category['thumbnail_url']))
                    <img src="{{ $category['thumbnail_url'] }}" class="h-32 w-full object-cover" alt="{{ $category['name'] }}" />
                @else
                    <img src="{{ asset('storage/placeholder.jpg') }}" class="h-32 w-full object-cover" /> <!-- Fallback if no thumbnail -->
                @endif
                <div class="px-4 py-3">
                    <h3 class="font-bold text-lg">{{ $category['name'] }}</h3>
                    <p class="text-gray-500 text-sm">({{ $category['courses_count'] }})</p>
                </div>
            </div>
        </a>
        @empty
            <p class="text-gray-500">No categories found.</p>
        @endforelse

    </div>

    <!-- See All Button (conditional, placed after scrollable area) -->
    @if($showSeeAll)
        <div class="mt-6 text-center">
            <a href="/category" class="bg-blue-600 text-white px-6 py-3 rounded-full font-semibold text-sm">
                See All ({{ $totalCategoryCount }})
            </a>
        </div>
    @endif

    <!-- Loading state -->
    <div wire:loading class="text-center mt-4">Loading categories...</div>
</section>
  </div>
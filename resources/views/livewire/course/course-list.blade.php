<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- ONE UNIFIED SEARCH BAR — THIS IS THE ONLY SEARCH BOX NOW --}}
    <div class="mb-10">
        <div class="max-w-3xl mx-auto">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Search courses by name, topic, tutor, or location..."
                    class="w-full py-5 px-6 pr-16 text-lg rounded-2xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all shadow-sm"
                    wire:model.live.debounce.500ms="searchQuery"
                >
                <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @if ($usePagination)
        <div class="mb-8 px-4 sm:px-0">
            <livewire:course.course-filter-bar
                :filterType="$this->filterType"
                :filterPrice="$this->filterPrice"
                :key="'main-filter-bar'"
            />
        </div>
    @endif

    <x-shared.list-section
        :title="$sectionTitle"
        :items="$items"
        :show-see-all="!$usePagination"
        :see-all-route="route('category.index', [
            'type' => $filterType !== 'all' ? $filterType : null,
            'price' => $filterPrice !== 'all' ? $filterPrice : null,
            'q' => $searchQuery ?: null   {{-- Changed from 'location' to 'q' --}}
        ])"
    />

    @if ($usePagination && isset($courses['links']))
        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    @endif
</div>
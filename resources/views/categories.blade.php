<x-layouts.dashboard title="Course Listings">

    {{-- CUSTOM SIDEBAR --}}
    <x-slot name="sidebar">
        <livewire:category-sidebar
            :active-category-slug="$categorySlug ?? null"
        />
    </x-slot>

    {{-- MAIN CONTENT --}}
    @livewire('course.course-list', [
        'categorySlug' => $categorySlug,
        'usePagination' => true,
    ])

</x-layouts.dashboard>

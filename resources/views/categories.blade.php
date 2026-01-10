<x-layouts.category title="Course Listings" :active-category-slug="$categorySlug">

    @livewire('course.course-list', [
        'categorySlug' => $categorySlug,
        'usePagination' => true,
    ])

</x-layouts.category>

<x-layouts.appdashboard title="Course Listings" :activeCategorySlug="$categorySlug">
    @livewire('course.course-list', [
        'categorySlug' => $categorySlug,
        'usePagination' => true,
    ])
</x-layouts.appdashboard>


<x-profile.dashboard-layout
    title="Course Listings"
    active-tab="course"
    :stats="['completed' => 2, 'pending' => 2]"
>

    <livewire:course.user-courses-list />

    <livewire:course.edit-course />

</x-profile.dashboard-layout>
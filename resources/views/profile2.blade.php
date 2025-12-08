<x-profile.dashboard-layout
    title="Course Listings"
    active-tab="profile"
    :stats="['completed' => 2, 'pending' => 2]"
>
<div class="container mx-auto py-8">
        {{-- Add the Livewire Component here --}}
        @livewire('course.enrolled-courses')
    </div>

</x-profile.dashboard-layout>
<x-layouts.dashboard title="My Courses">

    {{-- Tabs --}}
    <x-dashboard.tabs active="courses" />

    {{-- Page Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold">My Courses</h2>

        {{-- You already have this as Livewire --}}
        <livewire:profile.edit-profile />
        {{-- <livewire:profile.edit-button /> --}}
    </div>

    {{-- Courses Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        {{-- Existing Livewire cards --}}
     <livewire:course.user-courses-list />

    <livewire:course.edit-course />
    </div>

</x-layouts.dashboard>

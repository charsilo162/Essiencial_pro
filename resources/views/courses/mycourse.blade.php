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
    <div class="w-full">
        {{-- Existing Livewire cards --}}
     <livewire:course.user-courses-list />

   
    </div>

</x-layouts.dashboard>

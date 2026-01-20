<x-layouts.dashboard title="My Courses">
{{-- <x-layouts.app title="My Profile"> --}}
<div class="container mx-auto py-8">
        {{-- Add the Livewire Component here --}}
        @livewire('course.enrolled-courses')
    </div>
 <livewire:course.random-courses />
</x-layouts.dashboard>
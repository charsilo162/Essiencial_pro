<x-layouts.dashboard title="My Courses">
 
    {{-- Tabs --}}
    <x-dashboard.tabs active="courses" />
    {{-- Courses Grid --}}
    <div class="w-full">
        {{-- Existing Livewire cards --}}
         {{ $slot }}

   
    </div>

</x-layouts.dashboard>

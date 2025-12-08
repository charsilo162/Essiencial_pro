<x-layouts.home-layout>

    <main class="py-8">
        {{-- 
            Pass the course's ID to the Livewire component.
            Livewire will then use this ID in its mount method to fetch 
            the course and its videos.
        --}}
        
        @livewire('course.course-watch', ['slug' => $course['slug']])
    </main>


</x-layouts.home-layout>

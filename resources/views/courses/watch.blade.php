<x-layouts.app title="Course Watch">
   <main class="py-8">
        {{-- 
            Pass the course's ID to the Livewire component.
            Livewire will then use this ID in its mount method to fetch 
            the course and its videos.
        --}}
        
        @livewire('course.course-watch', ['slug' => $course['slug']])
    </main>

    <x-navigation.footer />
</x-layouts.app>

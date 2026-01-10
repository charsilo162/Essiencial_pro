<x-layouts.dashboard title="My Draft">
 
    {{-- Tabs --}}
    <x-dashboard.tabs active="drafts" />
     <!-- SECTION: Courses Without Videos -->
    <div class="mt-12">
        <livewire:course.no-video-courses />
    </div>

    <!-- SECTION: Add Video to Any Course (Modal Trigger) -->
    <div class="mt-12">
        <livewire:course.add-video-to-course />
    </div>
</x-layouts.dashboard>
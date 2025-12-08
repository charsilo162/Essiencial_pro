<x-profile.dashboard-layout
    title="My Videos"
    active-tab="draft"
    show-post-buttons="false"
    show-edit-modal="false"
   
>
     <!-- SECTION: Courses Without Videos -->
    <div class="mt-12">
        <livewire:course.no-video-courses />
    </div>

    <!-- SECTION: Add Video to Any Course (Modal Trigger) -->
    <div class="mt-12">
        <livewire:course.add-video-to-course />
    </div>
</x-profile.dashboard-layout>
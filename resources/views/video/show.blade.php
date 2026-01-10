<x-layouts.dashboard title="My Video Courses">

    {{-- Tabs --}}
    <x-dashboard.tabs active="videos" />
     <!-- SECTION: Courses Without Videos -->
    <div class="mt-12">
    <livewire:video.my-videos />
    </div>
</x-layouts.dashboard>
<section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Courses without videos</h2>
    </div>

    <!-- Live Search -->
    <div class="mb-6">
        <input type="text"
               wire:model.live.debounce.350ms="search"
               placeholder="Search courses..."
               class="w-full md:w-96 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($courses as $course)
            <x-course.no-video-card :course="$course" />
        @empty
            <p class="col-span-full text-center text-gray-500">
                @if($search)
                    No courses match “{{ $search }}”.
                @else
                    No courses without videos yet.
                @endif
            </p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $courses->links() }}
    </div>

    <!-- Add First Video Modal -->
    @if ($showAddVideoModal)
        <x-modal wire:model="showAddVideoModal" name="add-first-video-modal">
            <livewire:course.add-first-video :courseId="$selectedCourseId" />
        </x-modal>
    @endif
</section>
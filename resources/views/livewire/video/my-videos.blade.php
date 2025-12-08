<div>
    <section class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Search -->
        <div class="mb-6">
            <input type="text"
                   wire:model.live.debounce.350ms="search"
                   placeholder="Search your videos..."
                   class="w-full md:w-96 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
        </div>

        <!-- Video Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($videos['data'] as $video)
                <x-video.card :video="$video" />
            @empty
                <p class="col-span-full text-center text-gray-500 py-8">
                    @if($search)
                        No videos match "{{ $search }}".
                    @else
                        You haven't uploaded any videos yet.
                    @endif
                </p>
            @endforelse
        </div>

        <!-- Pagination -->
 @if (isset($videos['links']))
    <div class="mt-8">
        <div class="flex justify-center">
            @if ($videos['links']['prev'])
                <a href="{{ $videos['links']['prev'] }}" class="mx-1 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">‹ Prev</a>
            @endif

            <span class="mx-4 py-2 text-gray-600">
                Page {{ $videos['meta']['current_page'] }} of {{ $videos['meta']['last_page'] }}
            </span>

            @if ($videos['links']['next'])
                <a href="{{ $videos['links']['next'] }}" class="mx-1 px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">Next ›</a>
            @endif
        </div>
    </div>
@endif

        <!-- Edit Modal -->
        @if ($showEditModal)
            <x-modal name="edit-video-modal">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Edit Video</h3>
                    <form wire:submit="updateVideo">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-700 mb-1">Title</label>
                            <input type="text" wire:model="editTitle"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                            @error('editTitle') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Duration (seconds)</label>
                            <input type="number" wire:model="editDuration"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button"
                                    wire:click="closeEditModal"
                                    class="px-4 py-2 bg-gray-300 text-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </x-modal>
        @endif
    </section>
</div>
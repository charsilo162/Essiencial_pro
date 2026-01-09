<div>
    <h3 class="text-lg font-semibold mb-4">Add First Video</h3>

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <!-- Title -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Video Title *</label>
            <input type="text" 
                   wire:model="title"
                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
            @error('title') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Video Upload -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Video *</label>
            <input type="file" 
                   wire:model="video_file" 
                   accept="video/*"
                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
            @error('video_file') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Thumbnail -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail (optional)</label>
            <input type="file" 
                   wire:model="thumbnail_file" 
                   accept="image/*"
                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
            @error('thumbnail_file') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Duration -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Duration (seconds)</label>
            <input type="number" 
                   wire:model="duration"
                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-3">
            <button type="button" 
                    wire:click="$dispatch('close-modal', 'add-first-video-modal')"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                Cancel
            </button>
            <button type="submit"
                    class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                Save Video
            </button>
        </div>
    </form>
</div>
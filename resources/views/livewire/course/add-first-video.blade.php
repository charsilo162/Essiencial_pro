<div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">

    <!-- Header -->
    <h3 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center space-x-2">
        <span class="inline-block w-2 h-6 bg-orange-500 rounded-full"></span>
        <span>Add First Video</span>
    </h3>

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-5">

        <!-- Title -->
        <div class="space-y-1">
            <label class="text-gray-700 font-medium">Video Title *</label>
            <input type="text"
                   wire:model="title"
                   placeholder="Enter video title"
                   class="w-full px-4 py-2.5 rounded-xl border 
                          @error('title') border-red-500 bg-red-50 @else border-gray-300 @enderror
                          focus:ring-2 focus:ring-orange-400 focus:border-orange-400
                          transition">
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Video Upload -->
        <div class="space-y-1">
            <label class="text-gray-700 font-medium">Upload Video *</label>
            <input type="file"
                   wire:model="video_file"
                   accept="video/*"
                   class="w-full px-4 py-2.5 rounded-xl border cursor-pointer
                          @error('video_file') border-red-500 bg-red-50 @else border-gray-300 @enderror
                          focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition">
            @error('video_file')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Thumbnail -->
        <div class="space-y-1">
            <label class="text-gray-700 font-medium">Thumbnail (optional)</label>
            <input type="file"
                   wire:model="thumbnail_file"
                   accept="image/*"
                   class="w-full px-4 py-2.5 rounded-xl border cursor-pointer
                          @error('thumbnail_file') border-red-500 bg-red-50 @else border-gray-300 @enderror
                          focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition">
            @error('thumbnail_file')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Duration -->
        <div class="space-y-1">
            <label class="text-gray-700 font-medium">Duration (in seconds)</label>
            <input type="number"
                   wire:model="duration"
                   placeholder="e.g., 120"
                   class="w-full px-4 py-2.5 rounded-xl border border-gray-300
                          focus:ring-2 focus:ring-orange-400 focus:border-orange-400
                          transition">
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-3 pt-4">
            <button type="button"
                    wire:click="$dispatch('close-modal', 'add-first-video-modal')"
                    class="px-5 py-2.5 text-gray-700 bg-gray-200 rounded-xl 
                           hover:bg-gray-300 transition">
                Cancel
            </button>

            <button type="submit"
                    class="px-6 py-2.5 bg-orange-600 text-white rounded-xl
                           hover:bg-orange-700 shadow-md transition">
                Save Video
            </button>
        </div>

    </form>
</div>

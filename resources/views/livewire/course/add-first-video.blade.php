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
                        wire:loading.attr="disabled"
                        class="px-5 py-2.5 text-gray-700 bg-gray-200 rounded-xl 
                            hover:bg-gray-300 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    Cancel
                </button>

                <button type="submit"
                        wire:loading.attr="disabled"
                        wire:target="save, video_file, thumbnail_file"
                        class="relative px-6 py-2.5 bg-orange-600 text-white rounded-xl
                            hover:bg-orange-700 shadow-md transition disabled:opacity-70 disabled:cursor-not-allowed">
                    
                    <span wire:loading.remove wire:target="save">
                        Save Video
                    </span>

                    <span wire:loading wire:target="save" class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Saving...
                    </span>
                </button>
            </div>

            <div wire:loading wire:target="video_file" class="mt-2 text-sm text-orange-600 font-medium flex items-center gap-2">
                <div class="w-4 h-4 border-2 border-orange-600 border-t-transparent rounded-full animate-spin"></div>
                Uploading video to server...
            </div>

    </form>
</div>

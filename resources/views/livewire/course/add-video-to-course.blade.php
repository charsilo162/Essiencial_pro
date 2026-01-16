{{-- resources/views/livewire/course/add-video-to-course.blade.php --}}
<div>
    <button wire:click="openModal"
            class="inline-flex items-center px-6 py-3 bg-orange-600 text-white font-medium text-sm rounded-lg hover:bg-orange-700 transition">
        Add Video to Course
    </button>

    @if ($showModal)
        {{-- @php
                                dd($courses);
                            @endphp --}}
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-xl max-w-lg w-full p-6 shadow-xl overflow-y-auto max-h-screen">
                <h3 class="text-lg font-semibold mb-4">Add Video (Part {{ $order_index }})</h3>

                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <!-- Course Selector -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Select Course</label>
                        <select wire:model.live="selectedCourseId"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                            <option value="">Choose a course...</option>
                         
                            @foreach ($courses as $c)
                           
                                <option value="{{ $c['id'] }}">
                                    {{ $c['title'] }} 
                                    {{-- ({{ $c['next_order'] }} video{{ $c['video_count'] == 1 ? '' : 's' }}) --}}
                                </option>
                            @endforeach
                        </select>
                        @error('selectedCourseId') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Order Index -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Part #</label>
                        <input type="number" wire:model="order_index" min="1"
                               class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Video Title</label>
                        <input type="text" wire:model="title"
                               class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                        @error('title') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Video File Upload -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload Video</label>
                        <input type="file" wire:model="video_file" accept="video/*"
                               class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                        @error('video_file') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Thumbnail Upload -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail (optional)</label>
                        <input type="file" wire:model="thumbnail_file" accept="image/*"
                               class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                        @error('thumbnail_file') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Duration -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Duration (seconds)</label>
                        <input type="number" wire:model="duration"
                               class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-3">
                        <button type="button" wire:click="closeModal"
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
        </div>
    @endif
</div>
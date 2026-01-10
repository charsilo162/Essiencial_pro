<x-livewire.modal-form title="Edit Course" submit-action="updateCourse" submit-button-text="Update">
    
    {{-- 1. Category Selector --}}
    <div class="mb-4">
        <livewire:category-search-select :initialId="$category_id" 
        wire:key="edit-course-category-select-{{ $courseId ?? 'new' }}"/>
        @error('category_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
    </div>

    {{-- Publish Toggle --}}
    <div class="mb-4">
        <label class="flex items-center space-x-3">
            <input type="checkbox" 
                   wire:model.live="publish" 
                   class="w-5 h-5 text-orange-600 rounded focus:ring-orange-500">
            <span class="text-sm font-medium text-gray-700">Publish Course</span>
        </label>
        <p class="mt-1 text-xs text-gray-500">
            @if($publish)
                This course is <span class="font-semibold text-green-600">published</span> and visible to users.
            @else
                This course is <span class="font-semibold text-gray-600">draft</span> and hidden.
            @endif
        </p>
    </div>

    {{-- 2. Title Field --}}
    <div class="mb-4">
        <label for="course-title-edit" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" id="course-title-edit" wire:model.defer="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">
        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- 3. Course Type --}}
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-2">Course Type</label>
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input type="radio" wire:model.live="type" value="online" class="form-radio text-black focus:ring-black h-4 w-4">
                <span class="ml-2 text-gray-700">Online</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" wire:model.live="type" value="physical" class="form-radio text-black focus:ring-black h-4 w-4">
                <span class="ml-2 text-gray-700">Physical</span>
            </label>
        </div>
        @error('type') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
    </div>

    {{-- 4. Center Selector (Conditional) --}}
    @if ($type === 'physical')
        <div class="mb-4" wire:ignore>
            <livewire:center-search-select :initialId="$center_id" />
        </div>
        @error('center_id') 
            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
        @enderror
    @endif

    {{-- 5. Description Field --}}
    <div class="mb-4">
        <label for="course-desc-edit" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="course-desc-edit" wire:model.defer="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm"></textarea>
        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="course-price-edit" class="block text-sm font-medium text-gray-700">Price Amount (₦)</label>
        <input type="number" id="course-price-edit" wire:model.defer="price_amount" step="0.01" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">
        @error('price_amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    {{-- 6. Image Thumbnail Field --}}
    <div class="mb-4" x-data="{ isUploading: false, preview: null, file: null }" 
         x-on:livewire-upload-start="isUploading = true"
         x-on:livewire-upload-finish="isUploading = false"
         x-on:livewire-upload-error="isUploading = false"
         x-on:livewire-upload-progress="progress = $event.detail.progress">

        <label for="course-thumb-edit" class="block text-sm font-medium text-gray-700">Image Thumbnail</label>
        
        <input 
            type="file" 
            id="course-thumb-edit" 
            wire:model="image_thumb" 
            x-on:change="
                file = $event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => { preview = e.target.result; };
                    reader.readAsDataURL(file);
                } else {
                    preview = null;
                }
            "
            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
        >

        @error('image_thumb') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        
        <div x-show="preview" class="mt-3 w-32 h-32 border border-gray-200 rounded-lg overflow-hidden">
            <img :src="preview" alt="New Thumbnail Preview" class="w-full h-full object-cover">
        </div>

        {{-- FIXED: Use array syntax, not object --}}
        @if (!empty($course['image_thumbnail_url']))
            <div x-show="!preview" class="mt-3 w-32 h-32 border border-gray-200 rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $course['image_thumbnail_url']) }}" alt="Current Thumbnail" class="w-full h-full object-cover">
            </div>
        @endif

        <div x-show="isUploading" class="mt-2">
            <progress max="100" :value="progress"></progress>
        </div>
    </div>
    
</x-livewire.modal-form>
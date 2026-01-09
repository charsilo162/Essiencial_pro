<x-livewire.modal-form title="Post a Course" submit-action="saveCourse">
    
    {{-- 🛑 FIX: Use wire:ignore.self to prevent the entire CourseManager component 
       from re-rendering when the radio button (wire:model.live="type") is clicked.
       This stops the lazy-loading crash on the course list. --}}
    <div wire:ignore.self>
        
        {{-- 1. Category Selector --}}
        <div class="mb-4">
            <livewire:category-search-select :initialId="$category_id" />
            @error('category_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>
        
        {{-- 2. Title Field --}}
        <div class="mb-4">
            <label for="course-title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="course-title" wire:model.defer="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- 3. Course Type (Radio Buttons) --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Course Type</label>
            <div class="flex items-center space-x-4">
                
                <label class="inline-flex items-center">
                    {{-- wire:model.live is necessary to show/hide the center selector immediately --}}
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

        {{-- 🛑 4. Center Selector (Conditional) 🛑 --}}
        @if ($type === 'physical')
            {{-- wire:ignore is fine here, as it prevents only this child component from updating unnecessarily --}}
            <div class="mb-4" wire:ignore> 
                <livewire:center-search-select :initialId="$center_id" />
            </div>
            @error('center_id') 
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        @endif

        {{-- 4. Description Field --}}
        <div class="mb-4">
            <label for="course-desc" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="course-desc" wire:model.defer="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        {{-- 5. Image Thumbnail Field --}}
        <div class="mb-4" x-data="{ isUploading: false, preview: null, file: null }" 
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

            <label for="course-thumb" class="block text-sm font-medium text-gray-700">Image Thumbnail</label>
            
            <input 
                type="file" 
                id="course-thumb" 
                wire:model="image_thumb" 
                x-on:change="
                    file = $event.target.files[0];
                    const reader = new FileReader();
                    reader.onload = (e) => { preview = e.target.result; };
                    reader.readAsDataURL(file);
                "
                class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
            >

            @error('image_thumb') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            
            <div x-show="preview" class="mt-3 w-32 h-32 border border-gray-200 rounded-lg overflow-hidden">
                <img :src="preview" alt="Thumbnail Preview" class="w-full h-full object-cover">
            </div>

            <div x-show="isUploading" class="mt-2">
                <progress max="100" :value="progress"></progress>
            </div>
        </div>
        
    </div>
</x-livewire.modal-form>
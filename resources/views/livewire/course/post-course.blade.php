<x-livewire.modal-form title="Post a Course" submit-action="postCourse" submit-button-text="Post">
    
    {{-- 1. Category Selector --}}
    <div class="mb-4">
        <livewire:category.category-search-select :initialId="$category_id" />
        @error('category_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
    </div>
    
    {{-- 2. Title Field 🛑 ADDED HERE 🛑 --}}
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
        {{-- Use wire:ignore to prevent unnecessary component updates --}}
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
      <div>
            <label for="course-price-edit" class="block text-sm font-medium text-gray-700">Price Amount (₦)</label>
            <div class="relative mt-1">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 text-sm">₦</span>
                <input type="number" id="course-price-edit" wire:model.defer="price_amount" step="0.01" min="0" class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm">
            </div>
            @error('price_amount') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>
    {{-- 5. Image Thumbnail Field --}}
  <div 
    class="mb-4"
    x-data="{ isUploading: false, progress: 0, preview: null }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="
        isUploading = false;
        progress = 100;
    "
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <label class="block text-sm font-medium text-gray-700">
        Image Thumbnail
    </label>

    <input
        type="file"
        wire:model="image_thumb"
        x-on:change="
            const reader = new FileReader();
            reader.onload = e => preview = e.target.result;
            reader.readAsDataURL($event.target.files[0]);
        "
        class="mt-1 block w-full text-sm border border-gray-300 rounded-lg bg-gray-50"
    >

    @error('image_thumb')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <!-- Upload Progress -->
    <div x-show="isUploading" class="mt-2">
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div
                class="bg-orange-500 h-2 rounded-full transition-all"
                :style="`width: ${progress}%`"
            ></div>
        </div>
        <p class="text-xs text-gray-500 mt-1">Uploading… <span x-text="progress"></span>%</p>
    </div>

    <!-- Preview (User confirmation) -->
    <div x-show="preview && !isUploading" class="mt-4">
        <p class="text-xs text-green-600 font-medium mb-1">
            ✔ Image uploaded successfully
        </p>
        <img :src="preview" class="w-32 h-32 rounded-lg object-cover border">
    </div>
</div>

    
</x-livewire.modal-form>
<x-livewire.modal-form title="Post a Course" submit-action="postCourse" submit-button-text="Post">
    
    {{-- 1. Category Selector --}}
    <div class="mb-5">
        <livewire:category.category-search-select :initialId="$category_id" />
        @error('category_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
    </div>
    
    {{-- 2. Title --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-1">Course Title</label>
        <input type="text" wire:model.defer="title" 
               class="block w-full rounded-lg border-gray-300 shadow-sm 
                      focus:border-orange-500 focus:ring-orange-500 
                      py-3 px-4 text-base">
        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- 3. Course Type --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">Course Type</label>
        <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
                <input type="radio" wire:model.live="type" value="online" 
                       class="form-radio text-orange-500 focus:ring-orange-500 h-5 w-5">
                <span class="ml-2 text-gray-700 text-base">Online</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" wire:model.live="type" value="physical" 
                       class="form-radio text-orange-500 focus:ring-orange-500 h-5 w-5">
                <span class="ml-2 text-gray-700 text-base">Physical</span>
            </label>
        </div>
    </div>

    {{-- 4. Center Selector --}}
    @if ($type === 'physical')
        <div class="mb-5" wire:ignore> 
            <livewire:center-search-select :initialId="$center_id" />
            @error('center_id') 
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
            @enderror
        </div>
    @endif

    {{-- 5. Description --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea wire:model.defer="description" rows="4"
                  class="block w-full rounded-lg border-gray-300 shadow-sm 
                         focus:border-orange-500 focus:ring-orange-500 
                         py-3 px-4 text-base resize-y">
        </textarea>
        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- 6. About This Course (Dynamic) --}}
  <div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        About This Course <span class="text-red-500">*</span>
    </label>
    
    <div class="space-y-4">
        @foreach($about_course as $index => $point)
            <div class="flex gap-3 items-start">
                <div class="flex-1">
                    <textarea 
                        wire:model="about_course.{{ $index }}"
                        rows="2"
                        placeholder="e.g. Learn modern UI/UX design principles with real projects"
                        class="block w-full rounded-lg border-gray-300 shadow-sm 
                               focus:border-orange-500 focus:ring-orange-500 
                               py-3 px-4 text-base resize-y min-h-[52px]">
                    </textarea>
                    
                    @error("about_course.{$index}")
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                
                <button 
                    type="button"
                    wire:click="removeAboutPoint({{ $index }})"
                    class="mt-2 text-red-500 hover:text-red-700"
                    @if(count($about_course) === 1) disabled @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6h12v12" />
                    </svg>
                </button>
            </div>
        @endforeach
    </div>

    <button 
        type="button"
        wire:click="addAboutPoint"
        class="mt-4 inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add Another Point
    </button>

    @error('about_course') 
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
    @enderror
</div>

    {{-- 7. Price --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-1">Price Amount (₦)</label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500 text-base">₦</span>
            <input type="number" wire:model.defer="price_amount" step="0.01" min="0"
                   class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm 
                          focus:border-orange-500 focus:ring-orange-500 
                          py-3 px-4 text-base">
        </div>
        @error('price_amount') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
    </div>

    {{-- 8. Image Thumbnail --}}
    <div class="mb-4"
         x-data="{ isUploading: false, progress: 0, preview: null }"
         x-on:livewire-upload-start="isUploading = true"
         x-on:livewire-upload-finish="isUploading = false; progress = 100;"
         x-on:livewire-upload-error="isUploading = false"
         x-on:livewire-upload-progress="progress = $event.detail.progress">
        
        <label class="block text-sm font-medium text-gray-700 mb-1">Course Thumbnail Image</label>
        
        <input type="file" wire:model="image_thumb"
               class="block w-full text-base border border-gray-300 rounded-lg bg-gray-50 py-3 px-4">

        @error('image_thumb')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <!-- Preview -->
        <div x-show="preview" class="mt-3">
            <img :src="preview" class="w-40 h-32 object-cover rounded-lg border">
        </div>
    </div>

</x-livewire.modal-form>
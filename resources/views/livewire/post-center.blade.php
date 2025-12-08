<x-livewire.modal-form title="Post a Center" submit-action="postCenter">
    {{-- Center-specific fields --}}
    
    <div class="mb-4">
        <label for="center-name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="center-name" wire:model.defer="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label for="center-address" class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" id="center-address" wire:model.defer="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">
        @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label for="center-city" class="block text-sm font-medium text-gray-700">City</label>
        <input type="text" id="center-city" wire:model.defer="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">
        @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label for="center-exp" class="block text-sm font-medium text-gray-700">Years of Experience</label>
        <input type="number" id="center-exp" wire:model.defer="years_of_experience" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">
        @error('years_of_experience') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="center-desc" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="center-desc" wire:model.defer="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm"></textarea>
        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4" x-data="{ isUploading: false, preview: null, file: null }" 
         x-on:livewire-upload-start="isUploading = true"
         x-on:livewire-upload-finish="isUploading = false"
         x-on:livewire-upload-error="isUploading = false"
         x-on:livewire-upload-progress="progress = $event.detail.progress">

        <label for="center-thumb" class="block text-sm font-medium text-gray-700">Center Thumbnail</label>
        
        <input 
            type="file" 
            id="center-thumb" 
            wire:model="center_thumbnail_url" 
            x-on:change="
                file = $event.target.files[0];
                const reader = new FileReader();
                reader.onload = (e) => { preview = e.target.result; };
                reader.readAsDataURL(file);
            "
            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
        >

        @error('center_thumbnail_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        
        <div x-show="preview" class="mt-3 w-32 h-32 border border-gray-200 rounded-lg overflow-hidden">
            <img :src="preview" alt="Thumbnail Preview" class="w-full h-full object-cover">
        </div>

        <div x-show="isUploading" class="mt-2">
            <progress max="100" :value="progress"></progress>
        </div>
    </div>

</x-livewire.modal-form>
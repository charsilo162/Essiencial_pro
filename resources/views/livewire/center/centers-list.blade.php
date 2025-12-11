<div class="min-h-screen w-full px-6 py-10 
            bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]">

    <!-- Search Input -->
    <div class="mb-8">
        <input
            wire:model.live.debounce.300ms="search"
            type="text"
            placeholder="🔍 Search centers by name, address, city..."
            class="w-full px-5 py-3 text-white placeholder-gray-200 
                   bg-white/20 backdrop-blur-xl rounded-xl 
                   border border-white/30 shadow-md 
                   focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 
                   transition-all duration-300"
        />
    </div>

    <!-- Centers Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach ($centers as $center)
            <div
                class="rounded-2xl overflow-hidden shadow-xl backdrop-blur-xl
                       bg-white/10 border border-white/20
                       hover:border-yellow-400 hover:shadow-2xl hover:-translate-y-2
                       transition-all duration-300"
                wire:key="{{ $center['id'] }}"
            >

                <!-- Thumbnail -->
                @if ($center['image_url'])
                    <img
                        src="{{ $center['image_url'] }}"
                        alt="{{ $center['name'] }}"
                        class="w-full h-48 object-cover"
                    />
                @else
                    <div class="w-full h-48 bg-gray-300/40 text-white/70 flex items-center justify-center">
                        No Image
                    </div>
                @endif

                <!-- Content -->
                <div class="p-6 text-white">
                    
                    <h3 class="text-2xl font-bold mb-3 drop-shadow">
                        {{ $center['name'] }}
                    </h3>

                    <p class="text-gray-200 mb-1">
                        <strong class="text-yellow-300">Address:</strong> 
                        {{ $center['address'] }}, {{ $center['city'] }}
                    </p>

                    <p class="text-gray-200 mb-1">
                        <strong class="text-yellow-300">Experience:</strong>
                        {{ $center['years_of_experience'] }} years
                    </p>

                    <p class="text-gray-300 text-sm mb-4 line-clamp-3">
                        {{ Str::limit($center['description'], 110) }}
                    </p>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-3">

                        <!-- Edit Button -->
                        <button
                            wire:click="openEdit({{ $center['id'] }})"
                            class="px-4 py-2 rounded-lg
                                   bg-yellow-400 text-black font-semibold 
                                   hover:bg-yellow-300 shadow-md hover:shadow-xl
                                   transition-all duration-300"
                        >
                            ✏️ Edit
                        </button>

                        <!-- Delete Button -->
                        <button
                            wire:click="deleteCenter({{ $center['id'] }})"
                            wire:confirm="Are you sure you want to delete this center?"
                            class="px-4 py-2 rounded-lg
                                   bg-red-500 text-white font-semibold 
                                   hover:bg-red-600 shadow-md hover:shadow-xl
                                   transition-all duration-300"
                        >
                            🗑️ Delete
                        </button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10 text-white">
        {{ $centers->links() }}
    </div>

    <!-- Edit Modal -->

<x-livewire.modal-form title="Edit Center" submit-action="updateCenter">

    {{-- WRAP EVERYTHING IN A LIGHT BG --}}
    <div class="text-gray-800">

        <!-- Name -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input
                wire:model.defer="name"
                type="text"
                class="mt-1 w-full px-3 py-2 rounded-md 
                       bg-white border border-gray-300
                       focus:ring-[#661437] focus:border-[#661437]"
            />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                wire:model.defer="description"
                rows="3"
                class="mt-1 w-full px-3 py-2 rounded-md 
                       bg-white border border-gray-300
                       focus:ring-[#661437] focus:border-[#661437]"
            ></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Address</label>
            <input
                wire:model.defer="address"
                type="text"
                class="mt-1 w-full px-3 py-2 rounded-md
                       bg-white border border-gray-300
                       focus:ring-[#661437] focus:border-[#661437]"
            />
            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- City -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">City</label>
            <input
                wire:model.defer="city"
                type="text"
                class="mt-1 w-full px-3 py-2 rounded-md
                       bg-white border border-gray-300
                       focus:ring-[#661437] focus:border-[#661437]"
            />
            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Years of Experience -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Years of Experience</label>
            <input
                wire:model.defer="years_of_experience"
                type="number"
                min="0"
                class="mt-1 w-full px-3 py-2 rounded-md
                       bg-white border border-gray-300
                       focus:ring-[#661437] focus:border-[#661437]"
            />
            @error('years_of_experience') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Thumbnail Upload -->
        <div class="mb-4" 
             x-data="{ isUploading: false, preview: null, file: null }"
             x-on:livewire-upload-start="isUploading = true"
             x-on:livewire-upload-finish="isUploading = false"
             x-on:livewire-upload-error="isUploading = false"
             x-on:livewire-upload-progress="progress = $event.detail.progress">

            <label class="block text-sm font-medium text-gray-700">Thumbnail</label>

            <input
                type="file"
                wire:model="center_thumbnail"
                x-on:change="
                    file = $event.target.files[0];
                    const reader = new FileReader();
                    reader.onload = (e) => { preview = e.target.result; };
                    reader.readAsDataURL(file);
                "
                class="mt-1 w-full px-3 py-2 rounded-md
                       bg-white border border-gray-300 cursor-pointer"
            >

            @error('center_thumbnail') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror

            <div x-show="preview" class="mt-3 w-32 h-32 rounded-lg overflow-hidden border border-gray-300">
                <img :src="preview" class="w-full h-full object-cover">
            </div>

            <div x-show="isUploading" class="mt-2">
                <progress max="100" :value="progress" class="w-full"></progress>
            </div>
        </div>
    </div>

</x-livewire.modal-form>

</div>

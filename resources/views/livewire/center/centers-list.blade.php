<div class="min-h-screen w-full px-6 py-10 
            bg-gradient-to-r from-black via-gray-900 to-gray-800">

    <!-- Search Input -->
    <div class="mb-8">
        <input
            wire:model.live.debounce.300ms="search"
            type="text"
            placeholder="🔍 Search centers by name, address, city..."
            class="w-full px-5 py-3 text-white placeholder-gray-400
                   bg-black/40 backdrop-blur-xl rounded-xl
                   border border-white/20 shadow-md
                   focus:ring-2 focus:ring-white focus:border-white
                   transition-all duration-300"
        />
    </div>

    <!-- Centers Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach ($centers as $center)
            <div
                class="rounded-2xl overflow-hidden shadow-xl backdrop-blur-xl
                       bg-black/40 border border-white/20
                       hover:border-white hover:shadow-2xl hover:-translate-y-2
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
                    <div class="w-full h-48 bg-gray-700/40 text-gray-300 flex items-center justify-center">
                        No Image
                    </div>
                @endif

                <!-- Content -->
                <div class="p-6 text-white">
                    
                    <h3 class="text-2xl font-bold mb-3">
                        {{ $center['name'] }}
                    </h3>

                    <p class="text-gray-300 mb-1">
                        <strong class="text-white">Address:</strong> 
                        {{ $center['address'] }}, {{ $center['city'] }}
                    </p>

                    <p class="text-gray-300 mb-1">
                        <strong class="text-white">Experience:</strong>
                        {{ $center['years_of_experience'] }} years
                    </p>

                    <p class="text-gray-400 text-sm mb-4 line-clamp-3">
                        {{ Str::limit($center['description'], 110) }}
                    </p>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-3">

                        <!-- Edit Button -->
                        <button
                            wire:click="openEdit({{ $center['id'] }})"
                            class="px-4 py-2 rounded-lg
                                   bg-white text-black font-semibold
                                   hover:bg-gray-200 shadow-md hover:shadow-xl
                                   transition-all duration-300"
                        >
                            ✏️ Edit
                        </button>

                        <!-- Delete Button -->
                        <button
                            wire:click="deleteCenter({{ $center['id'] }})"
                            wire:confirm="Are you sure you want to delete this center?"
                            class="px-4 py-2 rounded-lg
                                   bg-black border border-white text-white font-semibold
                                   hover:bg-gray-900 shadow-md hover:shadow-xl
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

        <div class="text-gray-800">

            <!-- Shared Input Style -->
            @php
                $input = 'mt-1 w-full px-3 py-2 rounded-md bg-white border border-gray-300
                          focus:ring-black focus:border-black';
            @endphp

            <div class="mb-4">
                <label class="block text-sm font-medium">Name</label>
                <input wire:model.defer="name" type="text" class="{{ $input }}">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Description</label>
                <textarea wire:model.defer="description" rows="3" class="{{ $input }}"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Address</label>
                <input wire:model.defer="address" type="text" class="{{ $input }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">City</label>
                <input wire:model.defer="city" type="text" class="{{ $input }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Years of Experience</label>
                <input wire:model.defer="years_of_experience" type="number" min="0" class="{{ $input }}">
            </div>

            <!-- Thumbnail -->
            <div class="mb-4" x-data="{ preview: null }">
                <label class="block text-sm font-medium">Thumbnail</label>
                <input
                    type="file"
                    wire:model="center_thumbnail"
                    class="mt-1 w-full px-3 py-2 rounded-md bg-white border border-gray-300 cursor-pointer"
                >

                <div x-show="preview" class="mt-3 w-32 h-32 rounded-lg overflow-hidden border">
                    <img :src="preview" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

    </x-livewire.modal-form>

</div>

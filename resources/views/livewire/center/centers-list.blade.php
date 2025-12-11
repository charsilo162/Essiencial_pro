<div class="container mx-auto px-4 py-8">
    <!-- Search Input -->
    <div class="mb-6">
        <input
            wire:model.live.debounce.300ms="search"
            type="text"
            placeholder="Search centers by name, address, city..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
    </div>

    <!-- Centers Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($centers as $center)
            <div 
                class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
                wire:key="{{ $center['id'] }}"
            >
                <!-- Thumbnail -->
                @if ($center['center_thumbnail_url'])
                    <img 
                        src="{{ Storage::url($center['center_thumbnail_url']) }}" 
                        alt="{{ $center['name'] }}" 
                        class="w-full h-48 object-cover"
                    />
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif

                <!-- Content -->
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $center['name'] }}</h3>
                    <p class="text-gray-600 mb-1"><strong>Address:</strong> {{ $center['address'] }}, {{ $center['city'] }}</p>
                    <p class="text-gray-600 mb-1"><strong>Experience:</strong> {{ $center['years_of_experience'] }} years</p>
                    <p class="text-gray-500 text-sm mb-4">{{ Str::limit($center['description'], 100) }}</p>

                    <!-- Actions -->
                    <div class="flex justify-end">
                        <button 
                            wire:click="openEdit({{ $center['id'] }})"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
                        >
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $centers->links() }}
    </div>

    <!-- Edit Modal -->
    <x-modal wire:model="showModal" max-width="lg">
        <x-slot name="title">Edit Center</x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updateCenter">
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input 
                        wire:model="name" 
                        type="text" 
                        id="name" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea 
                        wire:model="description" 
                        id="description" 
                        rows="3" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    ></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input 
                        wire:model="address" 
                        type="text" 
                        id="address" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    />
                    @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- City -->
                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input 
                        wire:model="city" 
                        type="text" 
                        id="city" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    />
                    @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Years of Experience -->
                <div class="mb-4">
                    <label for="years_of_experience" class="block text-sm font-medium text-gray-700">Years of Experience</label>
                    <input 
                        wire:model="years_of_experience" 
                        type="number" 
                        id="years_of_experience" 
                        min="0"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    />
                    @error('years_of_experience') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Thumbnail Upload -->
                <div class="mb-4">
                    <label for="center_thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                    <input 
                        wire:model="center_thumbnail" 
                        type="file" 
                        id="center_thumbnail" 
                        class="mt-1 block w-full"
                    />
                    @error('center_thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
                    >
                        Update Center
                    </button>
                </div>
            </form>
        </x-slot>
    </x-modal>
</div>
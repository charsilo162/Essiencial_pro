<div>
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Categories</h2>
        <button wire:click="create"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Add Category
        </button>
    </div>
 
    <!-- Search -->
    <div class="mb-6">
        <input type="text" wire:model.live.debounce.300ms="search"
               placeholder="Search categories..."
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
    </div>

    <!-- Table -->
    <!-- Modern Category Grid -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

    @forelse($categories as $cat)
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden
                    hover:shadow-xl transition duration-300 transform hover:-translate-y-1">

            <!-- Thumbnail -->
<div class="h-40 w-full bg-gradient-to-r from-[#733c22] via-[#3b1501] to-[#70501b] flex items-center justify-center">
                @if($cat['thumbnail_url'])
                    <img src="{{ $cat['thumbnail_url'] }}"
                         class="h-28 w-28 rounded-full object-cover border-4 border-white shadow-md">
                @else
                    <div class="h-28 w-28 rounded-full bg-white bg-opacity-40 border-2 border-dashed border-white"></div>
                @endif
            </div>

            <!-- Content -->
            <div class="p-5">
                <h3 class="font-semibold text-lg text-gray-800">{{ $cat['name'] }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $cat['slug'] }}</p>

                <!-- Actions -->
                <div class="flex justify-end mt-5 gap-3">

                    <button wire:click="edit({{ $cat['id'] }})"
                        class="px-4 py-2 rounded-lg text-white text-sm font-medium
                               bg-blue-600 hover:bg-blue-700 transition">
                        Edit
                    </button>

                    <button wire:click="delete({{ $cat['id'] }})"
                        wire:confirm="Delete this category?"
                        class="px-4 py-2 rounded-lg text-white text-sm font-medium
                               bg-red-600 hover:bg-red-700 transition">
                        Delete
                    </button>

                </div>
            </div>

        </div>
    @empty
        <p class="text-gray-500 text-center col-span-full py-10">No categories found.</p>
    @endforelse
</div>


    <!-- Pagination -->
    <div class="mt-8">
    {{-- Change this line --}}
    {{ $paginator->links('livewire::tailwind') }}
</div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <h3 class="text-xl font-semibold mb-6">
                    {{ $editingId ? 'Edit Category' : 'Create New Category' }}
                </h3>

                <form wire:submit="save">
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" wire:model="name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
                        <input type="file" wire:model="thumbnail"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        @error('thumbnail') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    @if($editingId)
                        @php
                            $currentCategory = collect($categories)->firstWhere('id', $editingId);
                        @endphp

                        @if($currentCategory && $currentCategory['thumbnail_url'])
                            <div class="mb-5">
                                <p class="text-sm text-gray-600 mb-2">Current thumbnail:</p>
                                <img src="{{ $currentCategory['thumbnail_url'] }}"
                                    class="h-20 w-20 rounded-full object-cover border border-gray-300 shadow-sm"
                                    alt="Current thumbnail">
                            </div>
                        @endif
                    @endif
                    <div class="flex justify-end gap-3 mt-8">
                        <button type="button" wire:click="closeModal"
                                class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            {{ $editingId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- Toast Notification -->
    <div x-data="{ message: '', show: false }"
         x-init="$watch('message', () => show = !!message);
                  setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition
         class="fixed bottom-5 right-5 bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg z-50"
         style="display: none;">
        <span x-text="message"></span>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('notify', (e) => {
                    const toast = document.querySelector('[x-data]');
                    toast.__x.$data.message = e.message;
                });
            });
        </script>
    @endpush
</div>
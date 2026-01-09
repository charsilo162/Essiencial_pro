<div>
    <!-- Edit Profile Button (always visible) -->
    <button wire:click="openModal"
            class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition">
        Edit Profile
    </button>

    <!-- Modal Form - using the reusable modal component -->
    <x-livewire.modal-form
        title="Edit Profile"
        submit-action="updateProfile"
        submit-button-text="Update"
        :open="$showModal">  <!-- This controls visibility -->

        {{-- Current Photo Preview --}}
        @if ($currentPhotoUrl)
            <div class="mb-6 text-center">
                <p class="text-sm font-medium text-gray-700 mb-2">Current Photo</p>
                <img src="{{ $currentPhotoUrl }}"
                     alt="Current Profile Photo"
                     class="w-32 h-32 rounded-full object-cover mx-auto border border-gray-300">
            </div>
        @endif

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text"
                   id="name"
                   wire:model.defer="name"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black">
            @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email"
                   id="email"
                   wire:model.defer="email"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black">
            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Type --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Account Type</label>
            <div class="flex flex-col space-y-2">
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.live="type" value="user" class="form-radio text-black">
                    <span class="ml-2">User</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.live="type" value="center" class="form-radio text-black">
                    <span class="ml-2">Center</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.live="type" value="tutor" class="form-radio text-black">
                    <span class="ml-2">Tutor</span>
                </label>
            </div>
            @error('type') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Password (optional) --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">
                New Password <span class="text-gray-500 font-normal">(leave blank to keep current)</span>
            </label>
            <input type="password"
                   id="password"
                   wire:model.defer="password"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black">
            @error('password') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
            <input type="password"
                   id="password_confirmation"
                   wire:model.defer="password_confirmation"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black">
        </div>

        {{-- Photo Upload with Preview --}}
        <div class="mb-6"
             x-data="{ preview: null }"
             x-on:livewire-upload-start="isUploading = true"
             x-on:livewire-upload-finish="isUploading = false">

            <label for="photo" class="block text-sm font-medium text-gray-700">New Profile Photo (optional)</label>

            <input type="file"
                   id="photo"
                   wire:model="photo"
                   x-on:change="
                       const file = $event.target.files[0];
                       if (file) {
                           const reader = new FileReader();
                           reader.onload = (e) => preview = e.target.result;
                           reader.readAsDataURL(file);
                       } else {
                           preview = null;
                       }
                   "
                   class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">

            @error('photo') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror

            <!-- New photo preview -->
            <div x-show="preview" class="mt-4 w-32 h-32 mx-auto">
                <img :src="preview" alt="New photo preview"
                     class="w-full h-full rounded-full object-cover border border-gray-300">
            </div>
        </div>

    </x-livewire.modal-form>
</div>
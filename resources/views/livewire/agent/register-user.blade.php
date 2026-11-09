<div class="space-y-8 max-w-md">

    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Register a user</h2>

    {{-- LOGIN DETAILS (shown once) --}}
    @if ($created)
        <div class="rounded-xl border border-green-300 bg-green-50 p-4 text-sm text-green-900"
             x-data="{ copied: false }">
            <p class="font-semibold mb-2">{{ $created['name'] }} has been registered. Send them these details:</p>
            <pre class="whitespace-pre-wrap font-mono bg-white/70 rounded p-3">{{ $created['message'] }}</pre>
            <p class="mt-2 text-xs text-green-700">This password will not be shown again.</p>

            <div class="mt-3 flex items-center gap-4">
                <button type="button"
                    @click="navigator.clipboard.writeText(@js($created['message'])); copied = true"
                    class="px-3 py-1 rounded bg-green-600 text-white text-xs hover:bg-green-700">
                    <span x-show="!copied">Copy details</span>
                    <span x-show="copied" style="display: none;">Copied!</span>
                </button>
                <button wire:click="dismissCreated" type="button" class="text-xs underline">
                    Done, register another
                </button>
            </div>
        </div>
    @endif

    {{-- FORM --}}
    <form wire:submit.prevent="save" class="space-y-4" enctype="multipart/form-data">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" wire:model="name"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" wire:model="email"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
            <input type="text" wire:model="phone"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
            @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Account type</label>
            <select wire:model="type"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                <option value="user">User</option>
                <option value="tutor">Tutor</option>
                <option value="center">Center</option>
            </select>
            @error('type') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password (optional)</label>
            <input type="text" wire:model="password" placeholder="Leave empty to auto-generate"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo (optional)</label>
            <input type="file" wire:model="photo" accept="image/*"
                class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white">
            @error('photo') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="Preview"
                    class="mt-3 w-24 h-24 object-cover rounded-full border-2 border-sky-400 shadow-md">
            @endif
        </div>

        <button type="submit"
            class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-2 rounded-lg transition disabled:opacity-60"
            wire:loading.attr="disabled" wire:target="save,photo">
            <span wire:loading.remove wire:target="save">Register user</span>
            <span wire:loading wire:target="save">Processing...</span>
        </button>
    </form>
</div>
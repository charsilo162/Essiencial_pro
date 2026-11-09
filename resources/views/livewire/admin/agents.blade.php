<div class="space-y-8">

    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Agents</h2>

    {{-- LOGIN DETAILS (shown once) --}}
    @if ($created)
        <div class="rounded-xl border border-green-300 bg-green-50 p-4 text-sm text-green-900">
            <p class="font-semibold mb-2">Agent created. Send these login details to {{ $created['name'] }}:</p>
            <p>Email: <span class="font-mono">{{ $created['email'] }}</span></p>
            <p>Password: <span class="font-mono">{{ $created['password'] }}</span></p>
            <p class="mt-2 text-xs text-green-700">This password will not be shown again.</p>
            <button wire:click="dismissCreated" type="button"
                class="mt-3 text-xs underline">I have copied it</button>
        </div>
    @endif

    {{-- CREATE FORM --}}
    <form wire:submit.prevent="save" class="space-y-4 max-w-md">
        <h3 class="text-lg font-medium text-gray-800 dark:text-white">Add a new agent</h3>

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
            <label class="block text-sm font-medium text-gray-700 mb-1">Password (optional)</label>
            <input type="text" wire:model="password" placeholder="Leave empty to auto-generate"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
            class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-2 rounded-lg transition disabled:opacity-60"
            wire:loading.attr="disabled" wire:target="save">
            <span wire:loading.remove wire:target="save">Create agent</span>
            <span wire:loading wire:target="save">Processing...</span>
        </button>
    </form>

    {{-- AGENTS TABLE --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Users registered</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agents as $agent)
                    <tr class="border-t border-gray-200">
                        <td class="px-4 py-2">{{ $agent['name'] }}</td>
                        <td class="px-4 py-2">{{ $agent['email'] }}</td>
                        <td class="px-4 py-2">{{ $agent['phone'] ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $agent['registered_users_count'] ?? 0 }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No agents yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
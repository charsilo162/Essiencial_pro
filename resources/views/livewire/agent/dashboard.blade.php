<div class="space-y-8">

    <div class="flex items-center justify-between flex-wrap gap-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Agent Dashboard</h2>

        <a href="{{ route('agent.register-user') }}"
           class="bg-sky-500 hover:bg-sky-600 text-white font-semibold px-4 py-2 rounded-lg transition">
            + Register a user
        </a>
    </div>

    {{-- COUNT CARD --}}
    <div class="inline-block rounded-xl border border-sky-200 bg-sky-50 px-6 py-4">
        <p class="text-sm text-sky-700">People you have registered</p>
        <p class="text-3xl font-bold text-sky-900">{{ $total }}</p>
    </div>

    {{-- SEARCH --}}
    <div class="max-w-sm">
        <input type="text" wire:model.live.debounce.400ms="search"
            placeholder="Search by name or email"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Date registered</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-t border-gray-200">
                        <td class="px-4 py-2">{{ $user['name'] }}</td>
                        <td class="px-4 py-2">{{ $user['email'] }}</td>
                        <td class="px-4 py-2">{{ $user['phone'] ?? '-' }}</td>
                        <td class="px-4 py-2 capitalize">{{ $user['type'] ?? '-' }}</td>
                        <td class="px-4 py-2">
                            {{ !empty($user['created_at']) ? \Carbon\Carbon::parse($user['created_at'])->format('d M Y') : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            No users found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    @if ($lastPage > 1)
        <div class="flex items-center justify-between max-w-sm">
            <button wire:click="previousPage" type="button"
                @disabled($page <= 1)
                class="px-4 py-2 rounded-lg border border-gray-300 text-sm disabled:opacity-40">
                Previous
            </button>

            <span class="text-sm text-gray-600">Page {{ $page }} of {{ $lastPage }}</span>

            <button wire:click="nextPage" type="button"
                @disabled($page >= $lastPage)
                class="px-4 py-2 rounded-lg border border-gray-300 text-sm disabled:opacity-40">
                Next
            </button>
        </div>
    @endif
</div>
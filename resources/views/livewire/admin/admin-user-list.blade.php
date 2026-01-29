<div class="p-6 bg-white border rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Management</h2>
        <input wire:model.live.debounce.300ms="search" type="text" 
               placeholder="Search name or email..." 
               class="border rounded-lg px-4 py-2 w-1/3 shadow-sm focus:ring-blue-500">
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{-- @php
                    dd($users);
                @endphp --}}
                @foreach($users as $user)
                <tr wire:key="user-{{ $user['id'] }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $user['name'] }}</div>
                        <div class="text-sm text-gray-500">{{ $user['email'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 uppercase">
                            {{ $user['role'] ?? 'Student' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($user['is_active'])
                            <span class="px-2 py-1 text-xs rounded-md bg-green-100 text-green-700 font-bold italic">Active</span>
                        @else
                            <span class="px-2 py-1 text-xs rounded-md bg-red-100 text-red-700 font-bold italic">Disabled</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <button wire:click="toggleUserStatus({{ $user['id'] }})" 
                                class="px-3 py-1 rounded border {{ $user['is_active'] ? 'border-orange-500 text-orange-600 hover:bg-orange-50' : 'border-green-500 text-green-600 hover:bg-green-50' }}">
                            {{ $user['is_active'] ? 'Disable' : 'Enable' }}
                        </button>

                        <button onclick="confirm('Permanently delete user?') || event.stopImmediatePropagation()" 
                                wire:click="deleteUser({{ $user['id'] }})"
                                class="text-red-600 hover:text-red-900 underline">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
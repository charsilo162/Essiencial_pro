<div class="p-6 bg-white border rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Global Center Management</h2>
        <input wire:model.live.debounce.300ms="search" type="text" 
               placeholder="Search centers..." 
               class="border rounded-lg px-4 py-2 w-1/3 focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Center</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Exp.</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($centers as $center)
                <tr wire:key="center-{{ $center['id'] }}" class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full object-cover mr-3 border shadow-sm" 
                                 src="{{ $center['image_url'] }}" alt="{{ $center['name'] }}"
                                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($center['name']) }}&color=7F9CF5&background=EBF4FF'">
                            <div>
                                <div class="text-sm font-bold text-gray-900">{{ $center['name'] }}</div>
                                <div class="text-xs text-gray-500 truncate w-48">{{ $center['description'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="font-medium text-gray-700">{{ $center['city'] }}</div>
                        <div class="text-xs">{{ $center['address'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="px-2 py-1 bg-gray-100 rounded text-gray-700 font-medium">
                            {{ $center['years_of_experience'] }} yrs
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end items-center gap-3">
                            <button 
                                wire:click="toggleStatus({{ $center['id'] }})"
                                wire:loading.attr="disabled"
                                wire:target="toggleStatus({{ $center['id'] }})"
                                class="px-3 py-1.5 rounded-md text-xs font-bold uppercase tracking-wider transition-all
                                {{ $center['is_active'] 
                                    ? 'bg-green-100 text-green-700 hover:bg-green-200' 
                                    : 'bg-red-100 text-red-700 hover:bg-red-200' }}"
                            >
                                <span wire:loading.remove wire:target="toggleStatus({{ $center['id'] }})">
                                    {{ $center['is_active'] ? 'Active' : 'Blocked' }}
                                </span>
                                <span wire:loading wire:target="toggleStatus({{ $center['id'] }})">
                                    ...
                                </span>
                            </button>

                            <button 
                                onclick="confirm('This will globally delete this center. Are you sure?') || event.stopImmediatePropagation()" 
                                wire:click="deleteCenter({{ $center['id'] }})"
                                class="text-red-500 hover:text-red-700 p-1 rounded hover:bg-red-50 transition-colors"
                                title="Delete Center"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $centers->links() }}
    </div>
</div>
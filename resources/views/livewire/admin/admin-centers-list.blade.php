<div class="p-6 bg-white border rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Global Center Management</h2>
        <input wire:model.live.debounce.300ms="search" type="text" 
               placeholder="Search centers..." 
               class="border rounded-lg px-4 py-2 w-1/3">
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Center</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Exp.</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($centers as $center)
                <tr wire:key="center-{{ $center['id'] }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full object-cover mr-3" 
                                 src="{{ $center['image_url'] }}" alt="">
                            <div>
                                <div class="text-sm font-bold text-gray-900">{{ $center['name'] }}</div>
                                <div class="text-xs text-gray-500 truncate w-48">{{ $center['description'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $center['city'] }}, {{ $center['address'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $center['years_of_experience'] }} yrs
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" 
                                wire:click="deleteCenter({{ $center['id'] }})"
                                class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $centers->links() }}
    </div>
</div>
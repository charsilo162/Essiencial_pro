<div class="p-6 bg-white border rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Global Course Catalog</h2>
        <input wire:model.live.debounce.300ms="search" type="text" 
               placeholder="Search courses..." 
               class="border rounded-lg px-4 py-2 w-1/3 focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category & Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stats</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Admin Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($courses as $course)
                <tr wire:key="course-{{ $course['id'] }}" class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-12 w-16 rounded object-cover mr-3 border shadow-sm" 
                                 src="{{ $course['image_thumbnail_url'] }}" alt="">
                            <div>
                                <div class="text-sm font-bold text-gray-900">{{ $course['title'] }}</div>
                                <div class="text-xs text-gray-400">ID: #{{ $course['id'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $course['category']['name'] }}</div>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-bold uppercase {{ $course['type'] == 'online' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $course['type'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex gap-3">
                            <span title="Videos">🎥 {{ count($course['videos']) }}</span>
                            <span title="Students">👥 {{ $course['registered_count'] }}</span>
                            <span title="Rating">⭐ {{ $course['rating']['average'] }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                        {{ $course['price_formatted'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button 
                            wire:click="toggleActive({{ $course['id'] }})" 
                            wire:loading.attr="disabled"
                            wire:target="toggleActive({{ $course['id'] }})"
                            class="px-4 py-2 rounded-lg font-bold text-xs uppercase tracking-widest transition shadow-sm
                            {{ $course['is_active'] 
                                ? 'bg-green-600 text-white hover:bg-green-700' 
                                : 'bg-red-500 text-white hover:bg-red-600' }}"
                        >
                            <span wire:loading.remove wire:target="toggleActive({{ $course['id'] }})">
                                {{ $course['is_active'] ? 'Active' : 'Blocked' }}
                            </span>
                            <span wire:loading wire:target="toggleActive({{ $course['id'] }})">
                                ...
                            </span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $courses->links() }}
    </div>
</div>
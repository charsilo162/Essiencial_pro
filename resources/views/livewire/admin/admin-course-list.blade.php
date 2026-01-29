<div class="p-6 bg-white border rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Global Course Catalog</h2>
        <input wire:model.live.debounce.300ms="search" type="text" 
               placeholder="Search courses..." 
               class="border rounded-lg px-4 py-2 w-1/3">
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category & Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stats</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($courses as $course)
                <tr wire:key="course-{{ $course['id'] }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-12 w-16 rounded object-cover mr-3 border" 
                                 src="{{ $course['image_thumbnail_url'] }}" alt="">
                            <div>
                                <div class="text-sm font-bold text-gray-900">{{ $course['title'] }}</div>
                                <div class="text-xs text-gray-400">ID: #{{ $course['id'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $course['category']['name'] }}</div>
                        <span class="text-xs px-2 py-0.5 rounded-full {{ $course['type'] == 'online' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ ucfirst($course['type']) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex gap-3">
                            <span>🎥 {{ count($course['videos']) }}</span>
                            <span>👥 {{ $course['registered_count'] }}</span>
                            <span>⭐ {{ $course['rating']['average'] }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                        {{ $course['price_formatted'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="togglePublish({{ $course['id'] }})" 
                                class="px-4 py-2 rounded-lg font-semibold transition {{ $course['publish'] ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            {{ $course['publish'] ? 'Published' : 'Draft/Hidden' }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>
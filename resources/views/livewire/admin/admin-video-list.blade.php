<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800 tracking-tight">Video Moderation</h2>
            <p class="text-sm text-gray-500">Manage individual uploads across all courses</p>
        </div>
        <div class="relative">
            <input 
                wire:model.live.debounce.300ms="search" 
                type="text" 
                placeholder="Search videos..." 
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full md:w-64"
            >
            <div class="absolute left-3 top-2.5 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-semibold">
                <tr>
                    <th class="px-6 py-4">Preview / Title</th>
                    <th class="px-6 py-4">Course Assignment</th>
                    <th class="px-6 py-4 text-center">Duration</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($videos as $video)
                    <tr class="hover:bg-gray-50/80 transition-colors" wire:key="video-{{ $video['id'] }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="relative h-12 w-20 rounded bg-gray-200 overflow-hidden flex-shrink-0">
                                    <img src="{{ $video['thumbnail_url'] }}" alt="" class="w-full h-full object-cover" 
                                         onerror="this.src='https://placehold.co/200x120?text=No+Thumb'">
                                    <a href="{{ $video['video_url'] }}" target="_blank" class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 hover:opacity-100 transition-opacity">
                                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11v11.78a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                                    </a>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-gray-900 leading-tight">{{ $video['title'] }}</div>
                                    <div class="text-xs text-gray-500 mt-0.5 font-medium">ID: {{ $video['id'] }} • Added {{ $video['created_at'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if(!empty($video['courses']))
                                @foreach($video['courses'] as $course)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-blue-50 text-blue-700 border border-blue-100 mb-1">
                                        {{ $course['title'] }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-xs italic text-gray-400">Unassigned</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 text-center font-medium">
                            {{ $video['duration'] }}s
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                            @if($video['is_active'])
                                <span class="px-2 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-green-100 text-green-700 border border-green-200">Active</span>
                            @else
                                <span class="px-2 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-red-100 text-red-700 border border-red-200">Blocked</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-right">
                            <button 
                                wire:click="toggleActive({{ $video['id'] }})"
                                wire:loading.attr="disabled"
                                wire:target="toggleActive({{ $video['id'] }})"
                                class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-bold rounded-md shadow-sm text-white transition-all 
                                {{ $video['is_active'] ? 'bg-red-500 hover:bg-red-600' : 'bg-green-600 hover:bg-green-700' }}"
                            >
                                <span wire:loading.remove wire:target="toggleActive({{ $video['id'] }})">
                                    {{ $video['is_active'] ? 'Block' : 'Approve' }}
                                </span>
                                <span wire:loading wire:target="toggleActive({{ $video['id'] }})">
                                    Updating...
                                </span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500 italic">No videos found matching your search.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
        {{ $videos->links() }}
    </div>
</div>
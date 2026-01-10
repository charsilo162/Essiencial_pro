<div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
  
    @forelse ($courses as $course)
        <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 group">
            <!-- Thumbnail with overlay -->
            <div class="relative overflow-hidden">
                <img src="{{ $course['image_thumbnail_url'] ?? asset('storage/default_course.png') }}" 
                     alt="{{ $course['title'] }} thumbnail" 
                     class="h-48 w-full object-cover group-hover:scale-105 transition-transform duration-500">

                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                    <h3 class="text-white font-semibold text-lg line-clamp-1">{{ $course['title'] }}</h3>
                </div>

                <!-- Action buttons -->
                <div class="absolute top-3 right-3 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                    @if($confirmingDelete !== $course['id'])
                        <button wire:click="$dispatch('openEditCourseModal', { courseId: {{ $course['id'] }} })"
                                class="bg-white p-2 rounded-full shadow hover:bg-gray-100 text-gray-700 hover:scale-110 transition" title="Edit Course">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l2.586 2.586a1 1 0 010 1.414L13 17H9v-4z" />
                            </svg>
                        </button>
                    @endif
                    <div class="flex items-center">
                        @if($confirmingDelete === $course['id'])
                            <div class="flex items-center bg-red-600 rounded-full px-2 py-1 shadow-lg border border-red-700 space-x-2 transition-all">
                                <button wire:click="deleteCourse({{ $course['id'] }})" class="text-white hover:scale-125 transition" title="Confirm Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                                <div class="w-px h-3 bg-red-400"></div>
                                <button wire:click="$set('confirmingDelete', null)" class="text-white opacity-80 hover:opacity-100 hover:scale-125 transition" title="Cancel">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @else
                            <button wire:click="confirmDelete({{ $course['id'] }})" class="bg-white p-2 rounded-full shadow hover:bg-red-50 text-gray-600 hover:text-red-600 transition transform hover:scale-110" title="Delete Course">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="p-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium px-2 py-0.5 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 text-pink-700">{{ $course['type'] }}</span>
                    <span class="text-xs text-gray-500">{{ $course['registered_count'] ?? 0 }} enrolled</span>
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">{{ $course['title'] }}</h3>

                <div class="flex items-center text-yellow-400 mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= round($course['rating'] ?? 4) ? 'fill-current' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.905c.969 0 1.371 1.24.588 1.81l-3.973 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.973-2.887a1 1 0 00-1.176 0l-3.973 2.887c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.089 10.1c-.783-.57-.38-1.81.588-1.81h4.905a1 1 0 00.95-.69l1.518-4.674z"/>
                        </svg>
                    @endfor
                    <span class="ml-2 text-gray-500 text-sm">{{ $course['rating'] ?? '4.34' }}</span>
                </div>

                <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-bold text-gray-900">{{ $course['price_formatted'] ?? 'Free' }}</span>

                    <button wire:click="togglePublish({{ $course['id'] }})" wire:loading.attr="disabled"
                            class="px-3 py-1 text-xs font-medium rounded-full transition whitespace-nowrap
                            {{ $course['publish'] ? 'bg-red-100 text-red-700 hover:bg-red-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                        {{ $course['publish'] ? 'Unpublish' : 'Publish' }}
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="sm:col-span-2 lg:col-span-3 text-center py-12">
            <p class="text-gray-500">You haven't posted any courses yet.</p>
            <div class="mt-4">
                <livewire:course.post-course-button />
            </div>
        </div>
    @endforelse
</div>

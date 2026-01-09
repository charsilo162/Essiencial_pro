<div>
    <!-- Courses Grid -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse ($courses as $course)
            <div class="relative bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition group">
                <!-- Thumbnail -->
                <div class="relative">
                    <img src="{{ $course['image_thumbnail_url'] ?? asset('storage/default_course.png') }}"
                         alt="{{ $course['title'] }} thumbnail" class="h-48 w-full object-cover">

                    <!-- Action Buttons -->
                    <div class="absolute top-3 right-3 flex space-x-2 opacity-0 group-hover:opacity-100 transition">
                        <!-- Edit Button -->
                        <button
                            wire:click="$dispatch('openEditCourseModal', [{{ $course['id'] }}])"
                            class="bg-white p-1.5 rounded-full shadow hover:bg-gray-100"
                            title="Edit Course">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l2.586 2.586a1 1 0 010 1.414L13 17H9v-4z" />
                            </svg>
                        </button>

                        <!-- Delete Button -->
                        <button
                            class="bg-white p-1.5 rounded-full shadow hover:bg-gray-100"
                            title="Delete Course">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2" title="{{ $course['title'] }}">
                        {{ $course['title'] }}
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                            {{ $course['publish'] ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                            {{ $course['publish'] ? 'Live' : 'Draft' }}
                        </span>
                    </h3>

                    <div class="mt-2 flex items-center text-sm text-gray-500 space-x-2">
                        <span>{{ $course['registered_count'] ?? 0 }} enrolled</span>
                        <span class="px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-700 capitalize">{{ $course['type'] }}</span>
                    </div>

                    <div class="mt-3 flex items-center text-xs text-gray-500 space-x-4">
                        <span>💬 {{ $course['comments_count'] ?? 0 }} comments</span>
                        <span>❤️ {{ $course['likes_count'] ?? 0 }} likes</span>
                        <span>👁️ {{ $course['views_count'] ?? 0 }} views</span>
                    </div>

                    <div class="mt-3 flex items-center text-yellow-500">
                        ⭐⭐⭐⭐☆ <span class="ml-2 text-sm text-gray-500">{{ $course['rating'] ?? '4.34' }}</span>
                    </div>

                   

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-blue-600 text-sm font-medium">{{ number_format($course['registered_count'] ?? 0) }} enrolled</span>

                        <button 
                            wire:click="togglePublish({{ $course['id'] }})"
                            wire:loading.attr="disabled"
                            class="px-3 py-1 text-xs font-medium rounded-full transition whitespace-nowrap
                            {{ $course['publish'] ? 'bg-red-100 text-red-700 hover:bg-red-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }}"
                            title="{{ $course['publish'] ? 'Click to unpublish' : 'Click to publish' }}">
                            <span wire:loading.remove wire:target="togglePublish({{ $course['id'] }})">
                                {{ $course['publish'] ? 'Unpublish' : 'Publish' }}
                            </span>
                            <span wire:loading wire:target="togglePublish({{ $course['id'] }})">...</span>
                        </button>

                        <span class="text-gray-900 font-bold text-lg">
                            {{ $course['price_formatted'] ?? 'Free' }}
                        </span>
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

    <!-- Pagination Links -->
    <div class="mt-8">
       {{ $courses->onEachSide(0)->links() }}
    </div>
</div>
{{-- resources/views/livewire/comment-section.blade.php --}}
<section class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-2">
            Comments ({{ $comments->total() }})
        </h2>

        @if (session()->has('message'))
            <div class="p-3 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit="postComment" class="flex flex-col sm:flex-row gap-3 mb-10">
            {{-- <input
                wire:model.live="newCommentText"
                type="text"
                placeholder="Write a comment..."
                class="flex-1 py-3 px-5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            > --}}

                    <input
            wire:model="newCommentText"
            x-on:clear-comment-input.window="$el.value = ''"
            type="text"
            placeholder="Write a comment..."
            class="flex-1 py-3 px-5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          <button type="submit"
    class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition disabled:opacity-50"
    {{ session('user') ? '' : 'disabled title="Login required"' }}
>
    {{ session('user') ? 'Send' : 'Login to Comment' }}
</button>
        </form>

        @error('newCommentText')
            <p class="text-sm text-red-500 mb-4">{{ $message }}</p>
        @enderror

        <div class="space-y-8">
            @forelse ($comments as $comment)
                <div class="flex items-start space-x-4 border-b pb-6 last:border-b-0">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                        {{ strtoupper(substr($comment['user']['name'] ?? 'U', 0, 1)) }}
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center mb-1">
                            <p class="font-semibold text-gray-800">{{ $comment['user']['name'] ?? 'Anonymous' }}</p>
                            <span class="mx-2 text-gray-400">•</span>
                            <p class="text-sm text-gray-500">{{ $comment['created_at'] }}</p>
                        </div>
                        <p class="text-gray-700">{{ $comment['body'] }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 py-8">Be the first to comment!</p>
            @endforelse
        </div>

        {{-- PAGINATION — NOW WORKS 100% --}}
        @if ($comments->hasPages())
            <div class="mt-8">
                {{ $comments->links() }}
            </div>
        @endif
    </div>
</section>
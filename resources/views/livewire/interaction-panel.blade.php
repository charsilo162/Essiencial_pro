<div class="flex items-center gap-3">

    <button wire:click="vote('up')"
        class="px-4 py-2 text-sm rounded-lg border 
        {{ $userVoteType === 'up' ? 'bg-green-600 text-white border-green-600' : 'bg-white hover:bg-gray-50' }}">
        👍 {{ $upVoteCount }}
    </button>

    <button wire:click="vote('down')"
        class="px-4 py-2 text-sm rounded-lg border 
        {{ $userVoteType === 'down' ? 'bg-red-600 text-white border-red-600' : 'bg-white hover:bg-gray-50' }}">
        👎 {{ $downVoteCount }}
    </button>

</div>


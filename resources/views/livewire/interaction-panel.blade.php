<div class="flex items-center text-sm mt-4 mb-4 space-x-6">

    {{-- Thumbs Up Button --}}
    <button 
        wire:click="vote('up')" 
        class="flex items-center justify-center space-x-2 w-14 h-14 rounded-full 
               transition-all duration-200 shadow-md 
               {{ $userVoteType === 'up' ? 'bg-green-600 text-white shadow-lg scale-105' : 'bg-gray-700 text-white hover:bg-green-600 hover:shadow-lg' }}">
        
        <!-- White Thumbs Up Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14 9V5a3 3 0 00-6 0v4H5a2 2 0 00-2 2v6a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2v-6a2 2 0 00-2-2h-3z" />
        </svg>
        <span class="text-white font-bold">{{ $upVoteCount }}</span>
    </button>

    {{-- Thumbs Down Button --}}
    <button 
        wire:click="vote('down')" 
        class="flex items-center justify-center space-x-2 w-14 h-14 rounded-full 
               transition-all duration-200 shadow-md
               {{ $userVoteType === 'down' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-gray-700 text-red-400 hover:bg-red-600 hover:text-white hover:shadow-lg' }}">
        
        <!-- Red Thumbs Down Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 15v4a3 3 0 006 0v-4h3a2 2 0 002-2v-6a2 2 0 00-2-2h-3l-3-3-3 3H7a2 2 0 00-2 2v6a2 2 0 002 2h3z" />
        </svg>
        <span class="font-bold {{ $userVoteType === 'down' ? 'text-white' : 'text-red-400' }}">{{ $downVoteCount }}</span>
    </button>

</div>

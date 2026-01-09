<div class="flex items-center text-sm text-gray-700 mt-4 mb-4 space-x-6">
    
    {{-- Display Flash Message --}}
    @if (session()->has('message'))
        <div class="absolute top-0 right-0 mt-4 mr-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    
    {{-- Thumbs Up Button --}}
    <button 
        wire:click="vote('up')" 
        class="flex items-center space-x-1 transition-colors duration-200 
               {{ $userVoteType === 'up' ? 'text-green-600 font-bold' : 'text-gray-500 hover:text-green-600' }}">
        
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
            {{-- Original Thumbs Up Path --}}
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
        </svg>
        <span class="text-lg">{{ $upVoteCount }}</span>
    </button>
    
    {{-- Thumbs Down Button --}}
    <button 
        wire:click="vote('down')" 
        class="flex items-center space-x-1 transition-colors duration-200
               {{ $userVoteType === 'down' ? 'text-red-600 font-bold' : 'text-gray-500 hover:text-red-600' }}">
        
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
            {{-- Original Thumbs Down Path --}}
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
        </svg>
        <span class="text-lg">{{ $downVoteCount }}</span>
    </button>
</div>
<div class="flex items-center space-x-3 mt-4 mb-4">

    {{-- Stars --}}
    <div class="flex space-x-1">
        @for ($i = 1; $i <= 5; $i++)
            <button
                wire:click="rate({{ $i }})"
                class="group transition transform hover:scale-110 focus:outline-none"
                title="Rate {{ $i }} star{{ $i > 1 ? 's' : '' }}"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="w-8 h-8 transition-all duration-200
                    {{ $userRating >= $i 
                        ? 'text-yellow-400 fill-yellow-400' 
                        : 'text-gray-300 fill-none group-hover:text-yellow-400' }}"
                    stroke="currentColor"
                    stroke-width="1.5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M11.48 3.499a.75.75 0 0 1 1.04 0l2.69 2.736 3.782.55a.75.75 0 0 1 .415 1.279l-2.736 2.666.646 3.767a.75.75 0 0 1-1.088.79L12 13.347l-3.229 1.697a.75.75 0 0 1-1.088-.79l.646-3.767-2.736-2.666a.75.75 0 0 1 .415-1.279l3.782-.55 2.69-2.736Z"
                    />
                </svg>
            </button>
        @endfor
    </div>

    {{-- Average + count --}}
    <div class="text-sm text-gray-600">
        <span class="font-semibold text-gray-800">
            {{ number_format($average, 1) }}
        </span>
        <span class="text-gray-500">
            ({{ $count }} rating{{ $count !== 1 ? 's' : '' }})
        </span>
    </div>

</div>
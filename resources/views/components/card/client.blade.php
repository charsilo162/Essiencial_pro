@props(['logo'])

<div class="flex items-center justify-center h-10 my-4">
    <img src="{{ asset('storage/' . $logo) }}"
         alt="Client Logo"
         class="max-h-full w-auto filter grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition duration-300">
</div>
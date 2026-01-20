@props(['label', 'url' => '#'])  {{-- Add 'url' prop with default '#' for fallback --}}

<a href="{{ $url }}"  {{-- Use the $url prop here --}}
   class="block px-4 py-2 rounded hover:bg-slate-800 transition">
    {{ $label }}
</a>

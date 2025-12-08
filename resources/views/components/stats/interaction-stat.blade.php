@props(['icon', 'count', 'label'])

@php
// Define the SVG paths based on the icon name provided
$svg = match ($icon) {
'comment' => '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-2-6a1 1 0 011-1h.01a1 1 0 010 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>',
'heart' => '<path d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13.25a.75.75 0 00-1.5 0v5.5a.75.75 0 00.75.75h4.5a.75.75 0 000-1.5H11.5V6.75z" clip-rule="evenodd"></path>',
'eye' => '<path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.602 6.008 3 10 3s8.268 2.602 9.542 7c-1.274 4.398-5.55 7-9.542 7S1.732 14.398.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>',
'share' => '<path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.602 6.008 3 10 3s8.268 2.602 9.542 7c-1.274 4.398-5.55 7-9.542 7S1.732 14.398.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>', // Reusing the eye SVG for 'share' for simplicity
default => ''
};
@endphp

<div class="flex items-center">
<svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
{!! $svg !!}
</svg>
{{ number_format($count) }} {{ $label }}
</div>
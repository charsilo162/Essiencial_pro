@props(['icon', 'title'])

<div class="text-center p-4 bg-white rounded-lg shadow-md">
    <div class="mx-auto w-12 h-12 bg-sky-100 rounded-full flex items-center justify-center mb-4">
        {!! $icon !!}
    </div>
    <h3 class="text-sm font-semibold text-gray-900">{{ $title }}</h3>
</div>
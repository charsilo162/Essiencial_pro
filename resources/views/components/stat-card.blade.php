@props(['title', 'value', 'iconColor' => 'bg-blue-500'])

<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4">
    <div class="{{ $iconColor }} w-12 h-12 rounded-lg flex items-center justify-center text-white shadow-inner">
        {{ $slot }}
    </div>
    <div>
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ $title }}</p>
        <p class="text-2xl font-bold text-gray-900">{{ $value }}</p>
    </div>
</div>
<button {{ $attributes->merge([
    'class' => 'px-4 py-2 rounded bg-gray-200 text-gray-900 hover:bg-gray-300 transition font-medium'
]) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge([
    'class' => 'px-4 py-2 rounded bg-sky-600 text-white hover:bg-sky-700 transition font-medium'
]) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge([
    'class' => 'px-4 py-2 rounded bg-slate-900 text-white hover:bg-slate-800 transition font-medium'
]) }}>
    {{ $slot }}
</button>

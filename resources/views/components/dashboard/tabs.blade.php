@props(['active'])

<div class="border-b mb-6">
    <nav class="flex gap-6 text-sm">
        @foreach (['courses' => 'My Course', 'videos' => 'My Videos', 'drafts' => 'My Draft', 'overview' => 'Overview'] as $key => $label)
            <a href="#"
               class="pb-2 border-b-2 transition
               {{ $active === $key ? 'border-black font-semibold' : 'border-transparent text-gray-500' }}">
                {{ $label }}
            </a>
        @endforeach
    </nav>
</div>

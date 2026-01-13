@props(['href', 'active' => false])

<a href="{{ $href }}"
   @click="sidebarOpen = false"
   class="flex items-center px-3 py-2 rounded-lg text-sm transition
          {{ $active
              ? 'bg-white/10 text-white font-medium'
              : 'text-white/70 hover:bg-white/10 hover:text-white'
          }}">
    {{ $slot }}
</a>

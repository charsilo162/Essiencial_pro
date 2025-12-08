@props(['link' => '#', 'text' => 'View Details', 'class' => ''])

<a href="{{ $link }}" 
   class="bg-sky-500 text-white 
          font-semibold py-2 px-4 sm:px-6 
          text-sm sm:text-base 
          rounded-full hover:bg-sky-600 
          transition-colors flex-shrink-0 whitespace-nowrap 
          focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2
          {{ $class }}">
    {{ $text }}
</a>

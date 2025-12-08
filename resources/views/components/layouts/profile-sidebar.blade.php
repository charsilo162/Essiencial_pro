{{-- C:\xampp\htdocs\e_learning1\resources\views\livewire\category-sidebar.blade.php --}}
<div id="mobile-menu" 
     class="hs-overlay -translate-x-full transition-all duration-300 transform fixed top-0 start-0 bottom-0 z-40 w-64 bg-white border-e border-gray-200 lg:translate-x-0 lg:end-auto lg:bottom-0 lg:block pt-16"
     wire:ignore.self> 
    
    {{-- <div class="px-6 py-4">
        <input 
            type="text" 
            placeholder="Search Categories..." 
            class="w-full p-2 rounded-lg border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            wire:model.live.debounce.300ms="search" 
        />
    </div> --}}

    <nav class="p-4 space-y-1.5">
        <h3 class="px-3 pb-1 text-xs font-semibold uppercase text-gray-500">
           Profile
        </h3>
@if((session('user.role') ?? session('user.type') ?? '') !== 'user')

    <a href="{{ route('category.list') }}" 
       class="flex items-center justify-between gap-x-3.5 py-2 px-3 text-sm rounded-lg text-gray-700 hover:bg-gray-100 transition-colors
      bg-blue-100 text-blue-800 font-semibold"
      >
        <span>Categories</span>
    </a>
       <a href="{{ route('my.course') }}"
       class="flex items-center justify-between gap-x-3.5 py-2 px-3 text-sm rounded-lg text-gray-700 hover:bg-gray-100 transition-colors
      bg-blue-100 text-blue-800 font-semibold"
      >
        <span> My Course</span>
    </a>
    <a href="{{ route('courses.no-video') }}" 
       class="flex items-center justify-between gap-x-3.5 py-2 px-3 text-sm rounded-lg text-gray-700 hover:bg-gray-100 transition-colors
      bg-blue-100 text-blue-800 font-semibold"
      >
        <span> Draft</span>
    </a>
    
    <a href="{{ route('my.videos') }}"
       class="flex items-center justify-between gap-x-3.5 py-2 px-3 text-sm rounded-lg text-gray-700 hover:bg-gray-100 transition-colors
      bg-blue-100 text-blue-800 font-semibold"
      >
        <span>  My Videos</span>
    </a>

    <a href="" 
       class="flex items-center justify-between gap-x-3.5 py-2 px-3 text-sm rounded-lg text-gray-700 hover:bg-gray-100 transition-colors
      bg-blue-100 text-blue-800 font-semibold"
      >
        <span>profile</span>
    </a>
  @endif

     @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
   <livewire:post-center-button />
                        <livewire:course.post-course-button />
                   
               
                @endif
    </nav>
</div>
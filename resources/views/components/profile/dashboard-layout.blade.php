{{-- resources/views/components/profile/dashboard-layout.blade.php --}}
@props([
    'title' => 'Dashboard',
    'activeTab' => 'home',
    'showPostButtons' => true,
    'showEditModal' => true,
])

<x-layouts.profiledashboard :title="$title">
    {{-- Header --}}
    <div class="bg-white pt-6 pb-4 sm:pt-10 sm:pb-6 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex flex-col sm:flex-row items-start space-y-3 sm:space-y-0 sm:space-x-4 w-full">
                    <div class="flex items-start space-x-4">
                        <div class="shrink-0">
                            <img class="h-16 w-16 rounded-full object-cover"
                                 src="{{ asset('storage/img3.png') }}" alt="Ishola Balogun">
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-xl font-semibold text-gray-800">   {{ session('user.name') }}</h1>
                            <p class="text-sm text-gray-500 mt-0.5">   {{ session('user.email') }}</p>
                            {{-- <div class="flex flex-wrap items-center space-x-2 sm:space-x-4 mt-1 text-sm text-gray-500">
                                <span>{{ $stats['completed'] ?? 0 }} completed Videos</span>
                                <span class="text-gray-300 hidden sm:inline">|</span>
                                <span>{{ $stats['pending'] ?? 0 }} pending</span>
                            </div> --}}
                        </div>
                    </div>
                </div>

              
            </div>

            {{-- Include dependent components only when buttons are shown --}}
         
             @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
            @if($showPostButtons)
                <livewire:post-center />
                <livewire:course.post-course />
            @endif
             @endif
            
        </div>
    </div>



    {{-- Main Content --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white mt-8 pb-6 shadow-sm sm:rounded-lg">


            <div class="mt-6">
                {{ $slot }}
            </div>
        </div>
    </div>

    @if($showEditModal)
        {{ $editModal ?? '' }}
    @endif
</x-layouts.profiledashboard>
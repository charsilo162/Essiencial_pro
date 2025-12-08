<header class="sticky top-0 z-50 bg-white border-b shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16">
        
        <x-shared.logo class="mr-auto"/>

        <div class="hidden md:flex flex-1 justify-center space-x-8 text-sm font-medium">
            <x-navigation.main-menu />
        </div>

        <div class="ml-6">
            <x-shared.cta-button text="Get in Touch" href="#" />
        </div>

    </nav>
    @if(session('error'))
    <div style="background: #f8d7da; color: #842029; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="background: #d1e7dd; color: #0f5132; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif
</header>
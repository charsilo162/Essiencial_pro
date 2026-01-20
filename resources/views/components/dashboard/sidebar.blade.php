<aside class="w-64 bg-slate-900 text-white h-full">
    <div class="p-6 font-bold text-lg">
        etalent
    </div>

    <nav class="space-y-2 px-4">
        
         <x-dashboard.nav-link label="Home" url="{{ route('homes') }}" />
         @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
        <x-dashboard.nav-link label="Categories" url="{{ route('category.list') }}" />
        <x-dashboard.nav-link label="Draft" url="{{ route('courses.no-video') }}" />
        <x-dashboard.nav-link label="Centers" url="{{ route('center.centers') }}" />
        <x-dashboard.nav-link label="My Video" url="{{ route('my.videos') }}" />
        @else
        <x-dashboard.nav-link label="Categories" url="{{ route('category.index') }}" />
        {{-- <x-dashboard.nav-link label="Draft" />
        <x-dashboard.nav-link label="Centers" />
        <x-dashboard.nav-link label="Profile" /> --}}
        @endif
    </nav>
</aside>

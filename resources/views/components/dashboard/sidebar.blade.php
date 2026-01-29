<aside class="w-64 bg-slate-900 text-white h-full">
    <div class="p-6 font-bold text-lg">
        etalent
    </div>

    <nav class="space-y-2 px-4">
        
         <x-dashboard.nav-link label="Home" url="{{ route('homes') }}" />
         @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
        <x-dashboard.nav-link label="Categories" url="{{ route('category.list') }}" />
        <x-dashboard.nav-link label="Draft" url="{{ route('courses.no-video') }}" />
        <x-dashboard.nav-link label="Course" url="{{ route('my.course') }}" />
        <x-dashboard.nav-link label="Centers" url="{{ route('center.centers') }}" />
        <x-dashboard.nav-link label="My Video" url="{{ route('my.videos') }}" />
        <x-dashboard.nav-link label="My Enrolled Users" url="{{ route('enrolled.courses') }}" />





         <x-dashboard.nav-link label="All Users" url="{{ route('admin.users.index') }}" />
        <x-dashboard.nav-link label="All Centers" url="{{ route('admin.centers.index') }}" />
        <x-dashboard.nav-link label="All Courses" url="{{ route('admin.courses.index') }}" />
        <x-dashboard.nav-link label="All Videos" url="{{ route('admin.videos.index') }}" />
       @elseif ((session('user.role') ?? session('user.type') ?? '') == 'admin')
        <x-dashboard.nav-link label="All Users" url="{{ route('admin.users.index') }}" />
        <x-dashboard.nav-link label="All Centers" url="{{ route('admin.centers.index') }}" />
        <x-dashboard.nav-link label="All Courses" url="{{ route('admin.courses.index') }}" />
        <x-dashboard.nav-link label="All Videos" url="{{ route('admin.videos.index') }}" />
        @else
        <x-dashboard.nav-link label="Categories" url="{{ route('category.index') }}" />
        {{-- <x-dashboard.nav-link label="Draft" />
        <x-dashboard.nav-link label="Centers" />
        <x-dashboard.nav-link label="Profile" /> --}}
        @endif
    </nav>
</aside>

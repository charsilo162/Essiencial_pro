<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

    <!-- User Info -->
    <div>
        <p class="font-semibold text-gray-900">
            {{ session('user.name') }}
        </p>
        <p class="text-sm text-gray-500">
            {{ session('user.email') }}
        </p>
    </div>

    <!-- Edit Profile Button -->
    @if((session('user.role') ?? session('user.type') ?? '') == 'user')
        <div class="sm:shrink-0">
            <livewire:profile.edit-profile />
        </div>
    @endif

</div>

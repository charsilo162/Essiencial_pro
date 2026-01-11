@props([
    'commentsCount' => 0,
    'viewsCount' => 0,
    'likesCount' => 0, // NEW PROP
    'sharesCount' => 0, // NEW PROP
    'timeElapsed' => null, // Added the clock icon stat
])

{{-- This flex container holds all the stats --}}
<div class="flex flex-wrap gap-4 text-xs text-gray-500">
    <span>{{ $timeElapsed }}</span>
    <span>{{ $commentsCount }} comments</span>
    <span>{{ $likesCount }} likes</span>
</div>

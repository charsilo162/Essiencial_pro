<div>

<x-course.course-section>
    @forelse ($courses as $course)
        @php
        //  dd( $course,$course['badge'] );
         $courseData = [
    'title' => $course['title'],
    'description' => $course['short_description'] ?? 'Learn a new skill in this in-depth course.',
    'image' => $course['image'] ?? asset('storage/img3.png'),
    'badge' => 'PART ' . ($course['badge'] ?? 3),
    'price' => $course['price'] ?? 7000,
    'old_price' => ($course['old_price']?? 7000) + 1000, 
    'url' => ($course['url']?? '#'), 
];

        @endphp
        <x-course.course-card :course="$courseData" />
    @empty
        <p class="col-span-full text-gray-500">No courses found at the moment.</p>
    @endforelse
</x-course.course-section>


</div>
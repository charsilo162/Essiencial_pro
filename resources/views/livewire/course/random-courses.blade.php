<div>

<x-course.course-section>
    @forelse ($courses as $course)
        @php
        // dd( $course );
         $courseData = [
    'title' => $course['title'],
    'description' => $course['short_description'] ?? 'Learn a new skill in this in-depth course.',
    'image' => $course['thumbnail_url'] ?? asset('storage/img3.png'),
    'badge' => 'PART ' . ($course['first_video_part'] ?? 3),
    'price' => $course['Price'] ?? 7000,
    'old_price' => ($course['Price']?? 7000) + 1000, 
];

        @endphp
        <x-course.course-card :course="$courseData" />
    @empty
        <p class="col-span-full text-gray-500">No courses found at the moment.</p>
    @endforelse
</x-course.course-section>


</div>
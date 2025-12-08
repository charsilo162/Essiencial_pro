<x-list-section 
    :title="$title"
    :items="$courses" 
    item-prop-name="course" 
    item-component="course.card" 
    :show-search="false"
    :show-see-all="$showSeeAll"
    {{-- You can pass the center ID down to form the specific 'See All' URL --}}
    see-all-url="{{ route('category.index') }}" 
    {{-- see-all-url="{{ route('centers.courses.index', ['centerId' => $centerId]) }}"  --}}
/>
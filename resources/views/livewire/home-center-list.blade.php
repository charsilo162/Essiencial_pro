<x-center.list-section 
    title="Top Tutorials Around You" 
    :centers="$centers" 
    :search="$search" 
    :limit="$limit"
    :total-center-count="$totalCenterCount"
    :show-see-all="$showSeeAll" 
    grid-class="grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8"
    wire-model="search"
    button-click="performSearch"
    search-placeholder="Search centers by name or location..."
/>
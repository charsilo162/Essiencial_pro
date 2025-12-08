<div class="p-4 bg-white shadow rounded-lg sticky top-6">
    <h3 class="text-lg font-bold text-gray-900 mb-4">Course Categories 📚</h3>
    <ul class="space-y-2">
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('courses.index', ['category' => $category->slug]) }}" 
                   class="block p-2 rounded-md hover:bg-indigo-50 transition duration-150 text-gray-700 hover:text-indigo-600">
                    {{ $category->name }} ({{ $category->courses_count ?? 0 }})
                </a>
            </li>
        @endforeach
    </ul>
</div>
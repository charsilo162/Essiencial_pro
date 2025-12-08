<?php
namespace App\Livewire\Course;
use App\Models\Category; // Assuming you have a Category model
use Livewire\Component;

class CourseCategorySidebar extends Component
{
    // This links to the main course list page, filtering by category
    public function redirectToCategory(string $slug)
    {
        return $this->redirect(route('courses.category', ['categorySlug' => $slug]), navigate: true);
        // Or use a more general route:
        // return $this->redirect(route('courses.index', ['category' => $slug]), navigate: true);
    }

  public function render()
{
    $response = $this->api->withToken()->get('categories', ['limit' => 20]);
    $categories = $response['data'];

    return view('livewire.course.course-category-sidebar', compact('categories'));
}
}
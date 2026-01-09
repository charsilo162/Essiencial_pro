<?php 
namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\Attributes\Url;

class CategorySidebar extends Component
{
    #[Url(as: 'category_search', except: '')]
    public string $search = '';

    public $categories = [];
    public ?string $activeCategorySlug = null;

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
        $this->search = request('category_search', '');
        $this->loadCategories();
    }

    public function updatedSearch()
    {
        $this->loadCategories();
    }

public function loadCategories()
{
    $params = ['limit' => 10];
    if (!empty($this->search)) {
        $params['search'] = $this->search;
    }

    $response = $this->api->get('categories', $params); // ← REMOVED .withToken()
    $this->categories = $response['data'] ?? [];
}

    public function render()
    {
        return view('livewire.category-sidebar');
    }

    public function selectCategory(string $slug)
    {
        return $this->redirect(route('courses.index', ['category' => $slug]), navigate: true);
    }
}
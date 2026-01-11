<?php
namespace App\Livewire\Category;

use App\Services\ApiService;
use Livewire\Component;

class CategorySearchSelect extends Component
{
    public $searchTerm = '';
    public $categories = [];
    public $selectedId = null;
    public $selectedName = '';
    public $placeholder = 'Search or select a category...';

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function mount($initialId = null)
    {
        if ($initialId) {
            $category = $this->api->get("categories/{$initialId}")['data'];
            $this->selectedId = $initialId;
            $this->selectedName = $category['name'];
        }
        $this->loadInitialCategories();
    }

    public function loadInitialCategories()
    {
        $response = $this->api->get('categories', ['limit' => 10]);
        $this->categories = $response['data'];
    }

    public function updatedSearchTerm($value)
    {
        if (strlen($value) < 2) {
            $this->loadInitialCategories();
            return;
        }
        $response = $this->api->get('categories', ['search' => $value, 'limit' => 10]);
        $this->categories = $response['data'];
    }

    public function selectCategory($id, $name)
    {
        $this->selectedId = $id;
        $this->selectedName = $name;
        $this->searchTerm = '';
        $this->dispatch('categorySelected', categoryId: $id);
    }

    public function render()
    {
        return view('livewire.category.category-search-select');
    }
}
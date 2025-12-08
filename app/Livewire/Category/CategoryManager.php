<?php

namespace App\Livewire\Category;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class CategoryManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $perPage = 10;
    // public $page = 1;                    // REQUIRED for Livewire pagination

    // Form
    public $name = '';
    public $thumbnail;
    public $editingId = null;
    public $showModal = false;

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function mount()
    {
        $this->checkAuth();
        $this->resetForm();
    }

    public function checkAuth()
    {
        if (!Session::has('api_token')) {
            return redirect()->route('login');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $category = $this->findCategory($id);
        $this->editingId = $id;
        $this->name = $category['name'];
        $this->thumbnail = null;
        $this->showModal = true;
    }

    public function save()
{
    $this->validate([
        'name'      => 'required|string|max:100',
        'thumbnail' => 'nullable|image|max:2048',
    ]);

    $data = [
        ['name' => 'name', 'contents' => $this->name]
    ];

    if ($this->thumbnail) {
        $data[] = [
            'name'     => 'thumbnail',
            'contents' => fopen($this->thumbnail->getRealPath(), 'r'),
            'filename' => $this->thumbnail->getClientOriginalName(),
        ];
    }

    // ALWAYS use multipart when there's a file, never JSON
    if ($this->editingId) {
        $response = $this->api->putWithFile("categories/{$this->editingId}", $data);
    } else {
        $response = $this->api->postWithFile('categories', $data);
    }

    $this->closeModal();
    $this->dispatch('notify', ['message' => 'Category saved successfully!', 'type' => 'success']);
}

    public function delete($id)
    {
        $this->api->delete("categories/{$id}");
        $this->dispatch('notify', ['message' => 'Category deleted!', 'type' => 'success']);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->thumbnail = null;
        $this->editingId = null;
        $this->resetValidation();
    }

    protected function findCategory($id)
    {
        $response = $this->api->get("categories/{$id}");
        return $response['data'];
    }

public function render()
{
    $currentPage = $this->getPage();
  
$response = $this->api->get('categories', [
            'search'    => $this->search,
            'per_page'  => $this->perPage,
            'page'      => $currentPage, // Use the variable, not $this->page
        ]);
    // Use YOUR proven method — exactly like in your course component
  $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $response['data'] ?? [],
            $response['meta']['total'] ?? 0,
            $response['meta']['per_page'] ?? 10,
            $response['meta']['current_page'] ?? 1,
            [
                'path'     => request()->url(),
                'pageName' => 'page',
            ]
        );

    // Preserve search when paginating
    $paginator->appends(['search' => $this->search]);

    return view('livewire.category.category-manager', [
            'categories' => $response['data'],
            'paginator'  => $paginator,
        ]);
}
}
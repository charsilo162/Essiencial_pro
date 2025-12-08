<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\Attributes\Url;

class SimpleCategoryGrid extends Component
{
    #[Url(history: true)]
    public string $search = '';

    public int $limit = 6;

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class); // or new ApiService()
    }

    public function render()
    {
        $params = [
            'with_count' => 'courses',
            'order_by' => 'courses_count,desc', // ← fixed comma
        ];

        if ($this->search) {
            $params['search'] = $this->search;
        } else {
            $params['limit'] = $this->limit;
        }

        // REMOVE .withToken() → NOT NEEDED ANYMORE
        $response = $this->api->get('categories', $params);
// dd($response);
        $categories = collect($response['data'] ?? []);

        // Optional: total count when not searching
        $totalCategoryCount = empty($this->search)
            ? ($this->api->getCategoriesCount()['total'] ?? 0)
            : null;

        return view('livewire.simple-category-grid', [
           
            'categories' => $categories,
            'totalCategoryCount' => $totalCategoryCount,
        ]);
    }
}
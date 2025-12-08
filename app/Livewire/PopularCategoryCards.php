<?php
namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\Attributes\Url;

class PopularCategoryCards extends Component
{
   #[Url(history: true)]
    public string $search = '';

    public int $limit = 6;

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class); // or new ApiService()
    }


  // app/Livewire/PopularCategoryCards.php

public function render()
{
    $params = [
        'with_count' => 'courses',
        'order_by' => 'courses_count,desc',
    ];

    if ($this->search) {
        $params['search'] = $this->search;
    } else {
        $params['limit'] = $this->limit;
    }

    $response = $this->api->get('categories', $params);
    $categories = collect($response['data'] ?? []);

    $countResponse = $this->api->getCategoriesCount($this->search);
    $totalCategoryCount = $countResponse['total'] ?? 0;

    // Variable name: $showSeeAll (NOT $showAll!)
    $showSeeAll = empty($this->search) && $categories->count() >= $this->limit;

    return view('livewire.popular-category-cards', compact(
        'categories',
        'showSeeAll',        // ← Fixed: was 'showAll'
        'totalCategoryCount'
    ));
}
}
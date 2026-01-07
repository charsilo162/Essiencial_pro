<?php
namespace App\Livewire\Course;

use Livewire\Component;

class CoursePriceFilter extends Component
{
    public string $filterPrice = 'all';

    protected $listeners = [
        'clearAllFilters' => 'resetFilter',
    ];

    public function mount(string $filterPrice)
    {
        $this->filterPrice = $filterPrice;
    }

    public function setPriceFilter(string $priceRange)
    {
        // ✅ UPDATE LOCAL STATE
        $this->filterPrice = $priceRange;

        $this->dispatch('updateFilter', key: 'filterPrice', value: $priceRange);
    }

    public function resetFilter()
    {
        $this->filterPrice = 'all';
    }

    public function render()
    {
        return view('livewire.course.course-price-filter');
    }
}

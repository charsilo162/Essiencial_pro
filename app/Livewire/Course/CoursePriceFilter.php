<?php
namespace App\Livewire\Course;

use Livewire\Component;

class CoursePriceFilter extends Component
{
    // The current state is received as a parameter
    public string $filterPrice = 'all';

    public function mount(string $filterPrice): void
    {
        $this->filterPrice = $filterPrice;
    }

    public function setPriceFilter(string $priceRange): void
    {
        $this->filterPrice = $priceRange;
        // 🚨 IMPORTANT: Dispatch event to the parent (CourseList or CourseFilter)
        // We'll use a direct property update for simplicity with the refactored CourseList
        $this->dispatch('updateFilter', key: 'filterPrice', value: $priceRange);
    }
    
    // Clear all filters from the parent component
    public function clearFilters(): void
    {
        $this->filterPrice = 'all';
        $this->dispatch('updateFilter', key: 'filterPrice', value: 'all');
    }

    public function render()
    {
        return view('livewire.course.course-price-filter');
    }
}
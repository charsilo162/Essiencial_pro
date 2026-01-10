<?php

namespace App\Livewire\Course;

use Livewire\Component;

class CourseTypeFilter extends Component
{
    public string $filterType = 'all';

    protected $listeners = ['clearAllFilters' => 'resetFilter'];

    public function mount(string $filterType)
    {
        // This variable name must match the attribute name in the Blade call
        $this->filterType = $filterType;
    }

    public function setTypeFilter(string $type)
    {
        $this->filterType = $type;
        // Dispatch event to be caught by CourseFilterBar
        $this->dispatch('updateFilter', key: 'filterType', value: $type);
    }

    public function resetFilter()
    {
        $this->filterType = 'all';
    }

    public function render()
    {
        return view('livewire.course.course-type-filter');
    }
}
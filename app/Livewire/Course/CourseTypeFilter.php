<?php

namespace App\Livewire\Course;

use Livewire\Component;

class CourseTypeFilter extends Component
{
    public string $filterType = 'all';

    protected $listeners = [
        'clearAllFilters' => 'resetFilter',
    ];

    public function mount(string $filterType)
    {
        $this->filterType = $filterType;
    }

    public function setTypeFilter(string $type)
    {
        // ✅ UPDATE LOCAL STATE (THIS FIXES ACTIVE COLOR)
        $this->filterType = $type;

        // Dispatch to parent
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

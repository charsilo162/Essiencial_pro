<?php

namespace App\Livewire;

use Livewire\Component;

class TestimonialSection extends Component
{
    public array $testimonials = [];

    public function mount()
    {
        // Static data matching your client's design
        $this->testimonials = [
            [
                'stars' => 5,
                'feedback' => 'The training sessions was educating and enlightening. The facilitators were sound eloquent too. I enjoyed every part of it and will recommend it to other managers.',
                'name' => 'Adedoyin',
                'role' => 'IT Manager',
                'company' => 'Elaland Construction Ltd'
            ],
            [
                'stars' => 5,
                'feedback' => 'I enjoyed the training and gained good knowledge from it. The instructors know what they are doing.',
                'name' => 'Anthony Isibor',
                'role' => 'GM Business Development',
                'company' => 'Basscomm Group'
            ],
            // Duplicate rows to mimic the carousel grid layout in the image
            [
                'stars' => 5,
                'feedback' => 'The training sessions was educating and enlightening. The facilitators were sound eloquent too. I enjoyed every part of it and will recommend it to other managers.',
                'name' => 'Adedoyin',
                'role' => 'IT Manager',
                'company' => 'Elaland Construction Ltd'
            ],
            [
                'stars' => 5,
                'feedback' => 'I enjoyed the training and gained good knowledge from it. The instructors know what they are doing.',
                'name' => 'Anthony Isibor',
                'role' => 'GM Business Development',
                'company' => 'Basscomm Group'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.testimonial-section');
    }
}
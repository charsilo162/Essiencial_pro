<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TrainingPromo extends Component
{
    public $image;
    public $title;
    public $features;
    public $subtitle;
    public $ctaText;
    public $ctaHref;

    public function __construct(
        $image = 'img3.png',
        $title = "It's not magic. It's training",
        $features = [],
        $subtitle = 'Ready to ditch the CV struggle',
        $ctaText = 'Book a Demo',
        $ctaHref = '#'
    ) {
        $this->image = $image;
        $this->title = $title;
        $this->features = $features;
        $this->subtitle = $subtitle;
        $this->ctaText = $ctaText;
        $this->ctaHref = $ctaHref;
    }

    public function render()
    {
        return view('components.training-promo');
    }
}
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContactFooter extends Component
{
    public $phone;
    public $email;
    public $address;
    public $social;

    public function __construct(
        $phone = '+08453889243',
        $email = 'info@etraining.net',
        $address = '3 Walker Street, Edinburgh, EH3 7JY',
        $social = []
    ) {
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->social = $social;
    }

    public function render()
    {
        return view('components.contact-footer');
    }
}
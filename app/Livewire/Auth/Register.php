<?php

namespace App\Livewire\Auth;

use App\Services\ApiService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $type = 'user';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'type' => 'required|in:user,center,tutor',
        'password' => 'required|min:6|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $response = (new ApiService())->post('register', [
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        if (isset($response['errors'])) {
            foreach ($response['errors'] as $field => $messages) {
                $this->addError($field, is_array($messages) ? $messages[0] : $messages);
            }
            return;
        }

        // Save auth data
        Session::put('api_token', $response['token']);
        Session::put('user', $response['user']);

        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth', ['title' => 'Sign Up']);
    }
}
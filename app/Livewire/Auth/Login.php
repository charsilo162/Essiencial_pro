<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $isLoading = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

public function login()
{
    $this->validate();
    $this->isLoading = true;

    try {
        
        $response = (new \App\Services\ApiService())->post('login', [
            'email' => $this->email,
            'password' => $this->password,
        ]);
// dd($response);
if (isset($response['token'])) {
    // Store BOTH token AND user in session
    Session::put('api_token', $response['token']);
    Session::put('user', $response['user']);  // ← THIS IS THE WIN
 
    return redirect()->route('category.index');
}else{
    $this->addError('email', 'Invalid credentials');
}


        // Session::put('api_token', $response['token']);
        // return redirect()->route('categories');

    } catch (\Illuminate\Http\Client\RequestException $e) {
        // THIS WILL SHOW "Invalid credentials" EXACTLY
       
        $message = $e->response->json('message') ?? 'Invalid credentials';
        $this->addError('email', $message);

    } catch (\Exception $e) {
        $this->addError('email', 'Something went wrong. Try again.');
    }

    $this->isLoading = false;
}

    public function render()
    {
        return view('livewire.auth.login')
        ->layout('layouts.auth', [
            'title' => 'Login'
        ]);
        // return view('livewire.auth.login')->layout('layouts.guest');
    }
}
<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Illuminate\Validation\ValidationException;
use App\Services\ApiService;

class LoginForm extends Form
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * Call the external API to log the user in (Sanctum cookie-based)
     */
public function authenticate(): array
{
    $response = app(ApiService::class)->post('login', [
        'email' => $this->email,
        'password' => $this->password,
    ]);

    return $response; // now returns ['message' => ..., 'token' => '...']
}



}
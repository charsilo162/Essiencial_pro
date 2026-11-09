<?php

namespace App\Livewire\Auth;

use App\Services\ApiService;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $photo;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $type = 'user';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|email|max:255',
        'phone'                 => 'required|string|max:20', // Added phone validation rule
        'type'                  => 'required|in:user,center,tutor',
        'password'              => 'required|min:6|confirmed',
        'photo'                 => 'nullable|image|max:2048', 
    ];

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
        \Log::info('Photo selected and validated successfully: ' . $this->photo->getRealPath());
    }

    public function register()
    {
        $this->validate();

        $payload = [
            ['name' => 'name', 'contents' => $this->name],
            ['name' => 'email', 'contents' => $this->email],
            ['name' => 'phone', 'contents' => $this->phone], // Unconditional payload inclusion
            ['name' => 'type', 'contents' => $this->type],
            ['name' => 'password', 'contents' => $this->password],
            ['name' => 'password_confirmation', 'contents' => $this->password_confirmation],
        ];

        if ($this->photo) {
            $fileStream = fopen($this->photo->getRealPath(), 'r');
            $payload[] = [
                'name' => 'photo',
                'contents' => $fileStream,
                'filename' => $this->photo->getFilename(),
            ];
        }

        try {
            $response = (new ApiService())->postWithFile('register', $payload);

            // Handle standard error payloads if ApiService suppresses exceptions
            if (isset($response['errors'])) {
                foreach ($response['errors'] as $field => $messages) {
                    $this->addError($field, is_array($messages) ? $messages[0] : $messages);
                }
                return;
            }

            Session::put('api_token', $response['token']);
            Session::put('user', $response['user']);

            return redirect()->route('category.index');

        } catch (RequestException $e) {
            $response = $e->response->json();

            // Intercept validation errors (422 status code)
            if (isset($response['errors']) && is_array($response['errors'])) {
                foreach ($response['errors'] as $field => $messages) {
                    $this->addError($field, is_array($messages) ? $messages[0] : $messages);
                }
                return;
            }

            // Fallback general error message
            $this->addError('email', $response['message'] ?? 'An error occurred during registration.');
        } catch (\Exception $e) {
            $this->addError('email', 'Server error. Please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth', ['title' => 'Sign Up']);
    }
}
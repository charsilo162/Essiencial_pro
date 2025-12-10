<?php

namespace App\Livewire\Auth;

use App\Services\ApiService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
     use WithFileUploads;

    public $photo;
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
    // Add photo rules here for temporary upload validation
    'photo' => 'nullable|image|max:2048', 
];
// Add this method to App\Livewire\Auth\Register.php

public function updatedPhoto()
{
    // The framework automatically validates here using $rules
    $this->validateOnly('photo');
    // If validation passes, you can see a temporary file path is created
    // This is useful for confirmation
    \Log::info('Photo selected and validated successfully: ' . $this->photo->getRealPath());
}
public function register()
{
    $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'type' => 'required|in:user,center,tutor',
        'password' => 'required|min:6|confirmed',
        // Validate photo if uploaded
        'photo' => 'nullable|image|max:2048', // optional, max 2MB
    ]);

    // If user uploaded a photo, store it
    $photoPath = null;
    if ($this->photo) {
        $photoPath = $this->photo->store('profile_photos', 'public');
    }

    $payload = [
        'name' => $this->name,
        'email' => $this->email,
        'type' => $this->type,
        'password' => $this->password,
        'password_confirmation' => $this->password_confirmation,
    ];

    if ($photoPath) {
        $payload['photo'] = $photoPath; // Send path to API
    }

    $response = (new ApiService())->post('register', $payload);
// dd($response);
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
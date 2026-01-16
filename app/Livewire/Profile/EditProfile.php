<?php

namespace App\Livewire\Profile;

use App\Services\ApiService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public $showModal = false;

    // Form fields
    public $name = '';
    public $email = '';
    public $type = 'user';
    public $password = '';
    public $password_confirmation = '';
    public $photo; // temporary upload

    // Data loaded from API/session
    public $currentUser = [];
    public $currentPhotoUrl;

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function openModal()
    {
        $user = Session::get('user');

        // Optional: fetch fresh data from API if you have a dedicated edit endpoint
        // $response = $this->api->get('profile/edit');
        // $user = $response['data'] ?? $user;

        $this->fill([
            'name'                  => $user['name'] ?? '',
            'email'                 => $user['email'] ?? '',
            // 'type'                  => $user['type'] ?? 'user',
            'password'              => '',
            'password_confirmation'=> '',
        ]);

        $this->currentUser = $user;
        $this->currentPhotoUrl = $user['photo_path'] ?? null;
        $this->photo = null;

        $this->resetErrorBag();
        $this->showModal = true;

        // Let Alpine know the modal is open (if you use a global modal component)
        $this->dispatch('open-edit-profile-modal');
    }
        protected function rules()
        {
            return [
                'name'                  => 'required|string|max:255',
                'email'                 => 'required|email', // Remove unique:users
                // 'type'                  => 'required|in:user,center,tutor',
                'password'              => 'nullable|min:6|confirmed',
                'password_confirmation'=> 'nullable',
                'photo'                 => 'nullable|image|max:2048',
            ];
        }

    public function updateProfile()
    {
        $this->validate($this->rules());

        $payload = [
            ['name' => '_method', 'contents' => 'PUT'],
            ['name' => 'name',  'contents' => $this->name],
            ['name' => 'email', 'contents' => $this->email],
            // ['name' => 'type',  'contents' => $this->type],
        ];

        if ($this->password) {
            $payload[] = ['name' => 'password',              'contents' => $this->password];
            $payload[] = ['name' => 'password_confirmation','contents' => $this->password_confirmation];
        }

        if ($this->photo) {
            $payload[] = [
                'name'     => 'photo',
                'contents' => fopen($this->photo->getRealPath(), 'r'),
                'filename' => $this->photo->getClientOriginalName(),
            ];
        }

        // Assuming your backend uses PUT/PATCH via _method field
        // $payload[] = ['name' => '_method', 'contents' => 'PUT'];

        $response = $this->api->postWithFile('me/profile', $payload); // adjust endpoint as needed

        if (isset($response['errors']) || isset($response['error'])) {
            foreach ($response['errors'] ?? [] as $field => $messages) {
                $this->addError($field, is_array($messages) ? $messages[0] : $messages);
            }
            $this->dispatch('error-notification', message: $response['message'] ?? 'Update failed');
            return;
        }


        if (isset($response['user'])) {
        // 1. UPDATE THE SESSION: Overwrite the old "user" data with the new response
        Session::put('user', $response['user']);

        // 2. UPDATE COMPONENT STATE: So the modal looks correct if reopened
        $this->currentUser = $response['user'];
        $this->currentPhotoUrl = $response['user']['photo_path'] ?? null;

        $this->showModal = false;

        // 3. TELL THE REST OF THE PAGE: 
        // This sends a signal to other components (like your Header) to refresh
        $this->dispatch('profile-updated'); 
        
        $this->dispatch('success-notification', message: 'Profile updated!');
        return redirect(request()->header('Referer'));
        }
}
        // Update session
        // Session::put('user', $response['user'] ?? $response['data'] ?? $response);

        // $this->showModal = false;
        // $this->dispatch('success-notification', message: 'Profile updated successfully!');
        // $this->dispatch('profile-updated'); // optional for other components
    // }

    public function render()
    {
        return view('livewire.profile.edit-profile');
    }
}
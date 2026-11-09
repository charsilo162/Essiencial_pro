<?php
namespace App\Livewire\Agent;
use App\Services\ApiService;
use Illuminate\Http\Client\RequestException;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterUser extends Component
{
 use WithFileUploads;

 public $name = '';
 public $email = '';
 public $phone = '';
 public $type = 'user';
 public $password = '';
 public $photo;

 // Login details of the user just registered (shown once)
 public $created = null;

 protected $rules = [
  'name'  => 'required|string|max:255',
  'email' => 'required|email|max:255',
  'phone' => 'nullable|string|max:30',
  'type'  => 'required|in:user,center,tutor',
  'password' => 'nullable|min:6',
  'photo' => 'nullable|image|max:2048',
 ];

 public function updatedPhoto()
 {
  $this->validateOnly('photo');
 }

 public function save()
 {
  $this->validate();

  $payload = [
   ['name' => 'name', 'contents' => $this->name],
   ['name' => 'email', 'contents' => $this->email],
   ['name' => 'type', 'contents' => $this->type],
  ];

  if ($this->phone) {
   $payload[] = ['name' => 'phone', 'contents' => $this->phone];
  }

  // If left empty, the API generates a password
  if ($this->password) {
   $payload[] = ['name' => 'password', 'contents' => $this->password];
  }

  if ($this->photo) {
   $payload[] = [
    'name'  => 'photo',
    'contents' => fopen($this->photo->getRealPath(), 'r'),
    'filename' => $this->photo->getFilename(),
   ];
  }

  try {
   $response = (new ApiService())->postWithFile('agent/users', $payload);

   if (isset($response['errors'])) {
    $this->mapErrors($response['errors']);
    return;
   }

   if (!isset($response['login_details'])) {
    $this->addError('email', $response['message'] ?? 'Could not register the user.');
    return;
   }

   $email = $response['login_details']['email'];
   $password = $response['login_details']['password'];

   $this->created = [
    'name'  => $this->name,
    'email' => $email,
    'password' => $password,
    'message' => "Welcome to Essential!\n"
     . "Login here: " . route('logins') . "\n"
     . "Email: {$email}\n"
     . "Password: {$password}",
   ];

   $this->reset('name', 'email', 'phone', 'type', 'password', 'photo');

  } catch (RequestException $e) {
   $response = $e->response->json();

   if (isset($response['errors']) && is_array($response['errors'])) {
    $this->mapErrors($response['errors']);
    return;
   }

   $this->addError('email', $response['message'] ?? 'Could not register the user.');
  } catch (\Exception $e) {
   $this->addError('email', 'Server error. Please try again later.');
  }
 }

 public function dismissCreated()
 {
  $this->created = null;
 }

 private function mapErrors(array $errors): void
 {
  foreach ($errors as $field => $messages) {
   $this->addError($field, is_array($messages) ? $messages[0] : $messages);
  }
 }

 public function render()
 {
  return view('livewire.agent.register-user')
   ->layout('layouts.dashboard', ['title' => 'Register a User']);
 }
}
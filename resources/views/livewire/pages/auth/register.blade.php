<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

new class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $type = 'user'; // or make it a dropdown

   use App\Services\ApiService;

public function register(): void
{
    $this->validate([...]);

    $response = (new ApiService())->post('register', [
        'name' => $this->name,
        'email' => $this->email,
        'type' => $this->type,
        'password' => $this->password,
        'password_confirmation' => $this->password_confirmation,
    ]);

    if (isset($response['errors'])) {
        foreach ($response['errors'] as $field => $messages) {
            $this->addError($field, $messages[0]);
        }
        return;
    }

    Session::put('api_token', $response['token']);
    Session::put('user', $response['user']);

    $this->redirect(route('dashboard'), navigate: true);
}
};
?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- User Type (Optional - you can make it dropdown) -->
        <div class="mt-4">
            <x-input-label for="type" :value="__('Account Type')" />
            <select wire:model="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                <option value="user">Student / User</option>
                <option value="center">Training Center</option>
                <option value="tutor">Tutor / Instructor</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" type="password" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password" class="block mt-1 w-full" required />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
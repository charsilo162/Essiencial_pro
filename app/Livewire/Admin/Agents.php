<?php

namespace App\Livewire\Admin;

use App\Services\ApiService;
use Illuminate\Http\Client\RequestException;
use Livewire\Component;

class Agents extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $password = '';

    // Holds the new agent's login details so they can be shown once
    public $created = null;

    protected $rules = [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|max:255',
        'phone'    => 'nullable|string|max:30',
        'password' => 'nullable|min:6',
    ];

    public function save()
    {
        $this->validate();

        $payload = [
            ['name' => 'name',  'contents' => $this->name],
            ['name' => 'email', 'contents' => $this->email],
        ];

        if ($this->phone) {
            $payload[] = ['name' => 'phone', 'contents' => $this->phone];
        }

        // If left empty, the API generates a password
        if ($this->password) {
            $payload[] = ['name' => 'password', 'contents' => $this->password];
        }

        try {
            $response = (new ApiService())->postWithFile('admin/agents', $payload);

            if (isset($response['errors'])) {
                $this->mapErrors($response['errors']);
                return;
            }

            $this->created = [
                'name'     => $this->name,
                'email'    => $response['login_details']['email'] ?? $this->email,
                'password' => $response['login_details']['password'] ?? '',
            ];

            $this->reset('name', 'email', 'phone', 'password');

        } catch (RequestException $e) {
            $response = $e->response->json();

            if (isset($response['errors']) && is_array($response['errors'])) {
                $this->mapErrors($response['errors']);
                return;
            }

            $this->addError('email', $response['message'] ?? 'Could not create the agent.');
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
        $agents = [];

        try {
            $res = (new ApiService())->get('admin/agents');
            $agents = $res['data'] ?? [];
        } catch (\Exception $e) {
            // Show an empty table instead of crashing the page
        }

        return view('livewire.admin.agents', ['agents' => $agents])
            ->layout('layouts.dashboard', ['title' => 'Agents']);
    }
}
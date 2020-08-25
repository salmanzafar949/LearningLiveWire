<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $formFields = [
        'email' => '',
        'password' => '',
        'remember' => '',
    ];

    public function submit()
    {
        $this->validate([
            'formFields.email' => 'required|email|exists:users,email',
            'formFields.password' => 'required|min:8'
        ]);
    }
    public function render()
    {
        return view('livewire.login');
    }
}

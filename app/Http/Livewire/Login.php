<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
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

        $data  = [
            'email' => $this->formFields['email'],
            'password' => $this->formFields['password'],
        ];

        Auth::attempt($data, $this->formFields['remember']);

        return redirect('home');

    }
    public function render()
    {
        return view('livewire.login');
    }
}

<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $formFields = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    public function submit()
    {
        $this->validate([
            'formFields.name' => 'required|min:6',
            'formFields.email' => 'required|email|unique:users,email',
            'formFields.password' => 'required|confirmed|min:8'
        ]);



        User::create($this->formFields);

        return redirect('/');

    }

    public function render()
    {
        return view('livewire.register');
    }
}

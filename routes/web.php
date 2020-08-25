<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/home', 'home')->middleware('auth');

Route::middleware(['guest'])->group(function (){
    Route::livewire('/', 'login')->name('login');
    Route::livewire('/register', 'register')->name('register');
});

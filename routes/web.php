<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (){
    Route::livewire('/home', 'home')->name('home');
    Route::livewire('/file', 'file-upload')->name('file');
});


Route::middleware(['guest'])->group(function (){
    Route::livewire('/', 'login')->name('login');
    Route::livewire('/register', 'register')->name('register');
});

<?php

use Illuminate\Support\Facades\Route;


Route::livewire('/home', 'home')->middleware('auth');
Route::livewire('/', 'login')->name('login');
Route::livewire('/register', 'register');

//Auth::routes();

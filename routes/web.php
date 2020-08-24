<?php

use Illuminate\Support\Facades\Route;


Route::livewire('/com', 'comments');
Route::livewire('/tic', 'tickets');

Auth::routes();

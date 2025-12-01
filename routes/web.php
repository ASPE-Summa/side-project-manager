<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('projects', ProjectController::class);
Route::resource('ideas', IdeaController::class);

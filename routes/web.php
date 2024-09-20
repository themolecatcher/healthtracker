<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/resources', 'resources');

Route::controller(MealController::class)->group(function(){
    Route::get('/meals', 'index');
    Route::get('/meals/create', 'create');
    Route::get('/meals/{meal}', 'show');
    Route::post('/meals', 'store');
    Route::get('/meals/{meal}/edit', 'edit');
    Route::patch('/meals/{meal}', 'update');
    Route::delete('/meals/{meal}','destroy');
});

Route::resource('meals', MealController::class);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);




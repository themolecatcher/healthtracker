<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Mail\MealAdded;

Route::get('test', function() {

});

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/resources', 'resources');


Route::get('/meals', [MealController::class], 'index');
Route::get('/meals/create', [MealController::class], 'create')->middleware('auth');
Route::get('/meals/{meal}', [MealController::class], 'show')
    ->middleware('auth');
    // ->can('view', 'meal');

Route::post('/meals', [MealController::class], 'store')->middleware('auth');

Route::get('/meals/{meal}/edit', [MealController::class], 'edit')
    ->middleware('auth')
    ->can('edit', 'meal');

Route::patch('/meals/{meal}', [MealController::class], 'update')
    ->middleware('auth')
    ->can('edit', 'meal');

Route::delete('/meals/{meal}', [MealController::class], 'destroy')
    ->middleware('auth')
    ->can('edit', 'meal');


Route::resource('meals', MealController::class);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login',[SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);


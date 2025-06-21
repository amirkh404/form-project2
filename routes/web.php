<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Models\User;

// Route::get('/', function () {
//     $users = User::all();
//     return view('welcome',compact('users'));
// });
Route::get('/' , [RegisterController::class , 'showForm']);
Route::post('/register' , [RegisterController::class , 'submitForm']);
Route::get('/forms',[RegisterController::class , 'index']);
Route::get('/results',[RegisterController::class,'search']);
Route::delete('/users/{id}',[RegisterController::class,'destroy'])->name('users.destroy');

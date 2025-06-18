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
// Route::get('/',[RegisterController::class , 'store']);
Route::get('/forms',[RegisterController::class , 'index']);

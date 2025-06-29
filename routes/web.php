<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AccountController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     $users = User::all();
//     return view('welcome',compact('users'));
// });
Route::middleware('auth')->group(function(){
Route::get('/forms',[RegisterController::class , 'index']);
Route::get('/results',[RegisterController::class,'search']);
Route::delete('/users/{id}',[RegisterController::class,'delete'])->name('users.destroy');
Route::delete('/account/delete', [AccountController::class, 'destroy'])->middleware('auth')->name('account.delete');
Route::post('/logout',[LoginController::class , 'logout'])->name('logout');
});
Route::get('/' , [RegisterController::class , 'showForm']);
Route::post('/register' , [RegisterController::class , 'register'])->middleware('web')->name('register.submit');
Route::get('/login',[LoginController::class , 'showloginform'])->name('login');
Route::post('/login',[LoginController::class , 'login']);

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('home');
    }
    public function submitForm(Request $request)
    {
        $validate = $request -> validate ([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'password' => Hash::make($validate['password']),
        ]);
        return redirect('/')->with('success','kihkihi');
    }
    public function index(Request $request)
    {
        $search = $request->input('$serch');
        $users = User::when($search, function ($query, $search)
        {
            return $query->where('name','like',"%{$search}%")
                         ->orWhere('email','like',"%{$search}%");
        })->paginate(10);
        return view('forms',compact('users','search'));
    }
}

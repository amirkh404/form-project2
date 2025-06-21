<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

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
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'password' => Hash::make($validate['password']),
        ]);
        return redirect('/forms')->with('success','kihkihi');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search)
        {
            return $query->where('name','like',"%{$search}%")
                         ->orWhere('email','like',"%{$search}%");
        })->paginate(10);
        return view('forms',compact('users','search'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search)
        {
            return $query->where('name','like',"%{$search}%")
                         ->orWhere('email','like',"%{$search}%");
        })->paginate(10);
        return view('results',compact('users','search'));
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/forms');
    }
}

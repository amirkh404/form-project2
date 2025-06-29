<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credent = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($this->authService->login($credent)) {
            $this->authService->regenerateSession($request);
            return redirect('/forms')->with('success', 'با موفقیت وارد شدید');
        }

        return back()->withErrors([
            'email' => 'ایمیل یا رمز عبور اشتباه است',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return response()->json(['success' => true]);
    }
}
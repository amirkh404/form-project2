<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthService
{
    public function login(array $credent): bool
    {
        return Auth::attempt($credent);
    }

    public function logout(Request $request): void
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function regenerateSession(Request $request): void
    {
        $request->session()->regenerate();
    }
}





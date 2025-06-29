<?php

namespace App\Http\Controllers\Auth;

use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected UserService $userService;
    protected AuthService $authService;

    public function __construct(UserService $userService, AuthService $authService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }

    public function destroy(Request $request)
    {
        $user = $request->user();

        $this->userService->deleteUser($user);   
        $this->authService->logout($request);

        return response()->json(['success' => true]);
    }
}

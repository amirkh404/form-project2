<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\RegisterService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{

    protected RegisterService $registerService;
    protected UserService $userService;

    public function __construct(RegisterService $registerService, UserService $userService)
    {
        $this->registerService = $registerService;
        $this->userService = $userService;
    }

    public function showForm()
    {
        return view('home');
    }
     public function register(RegisterRequest $request)
    {
        $this->registerService->registerUser($request);
        return redirect('/forms')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }
    public function index(Request $request)
    {
        $users = $this->userService->search($request);
        return view('forms', compact('users'));
    }
    public function search(Request $request)
    {
        $users = $this->userService->search($request);
        $search = $request->query('search');
        return view('results', compact('users','search'));
    }
    public function delete($id)
    {
        $user = $this->userService->findById($id);
        $this->userService->deleteUser($user);
        return response()->json(['success' => true]);
    }
}

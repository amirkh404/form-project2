<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function search(Request $request)
    {
        $search = $request->query('search');
        return $this->userRepository->search($search)->orderBy('created_at', 'desc')->paginate(10);
    }
    public function deleteUser(User $user)
    {
        return $this->userRepository->delete($user);
    }
    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }
}

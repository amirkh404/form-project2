<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function search(?string $term)
    {
        return User::when($term, function ($query, $term) {
            $query->where('name', 'like', "%{$term}%")
                  ->orWhere('email', 'like', "%{$term}%");
        });
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

        public function findById(int $id): ?User
    {
        return User::findOrFail($id);
    }
}

<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function search(?string $term);

    public function delete(User $user): bool;

    public function findById(int $id): ?User;
}
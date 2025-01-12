<?php

namespace App\Data\Interfaces\Services;

use App\Domain\Entities\User;

interface UserServiceInterface {
  public function getAllUsers(): array;

  public function createUser(User $user): bool;

  public function getUserById(int $id): ?User;

  public function updateUser(int $id, User $user): bool;

  public function deleteUser(int $id): bool;
}

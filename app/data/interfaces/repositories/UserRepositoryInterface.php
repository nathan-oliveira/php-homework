<?php

namespace App\Data\Interfaces\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface {
  public function all(): array;

  public function find(int $id): ?User;

  public function create(User $user): bool;

  public function update(int $id, User $user): bool;

  public function delete(int $id): bool;
}

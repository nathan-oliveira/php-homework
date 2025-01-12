<?php

namespace App\Domain\Services;

// use App\Data\Repositories\UserRepository;
use App\Domain\Entities\User;
use App\Data\Interfaces\Repositories\UserRepositoryInterface;
use App\Data\Interfaces\Services\UserServiceInterface;

class UserService implements UserServiceInterface {
  private UserRepositoryInterface $userRepository;

  public function __construct(UserRepositoryInterface $userRepository) {
    $this->userRepository = $userRepository;
  }

  public function getAllUsers(): array {
    return $this->userRepository->all();
  }

  public function createUser($data): bool {
    $user = new User(null, $data['name'], $data['email']);
    return $this->userRepository->create($user);
  }

  public function getUserById($id): ?User {
    return $this->userRepository->find($id);
  }

  public function updateUser($id, $data): bool {
    $user = new User($id, $data['name'], $data['email']);
    return $this->userRepository->update($id, $user);
  }

  public function deleteUser($id): bool {
    return $this->userRepository->delete($id);
  }
}

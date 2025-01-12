<?php

namespace App\Presentation\Controllers;

use App\Domain\Services\UserService;

class ApiUserController {
  private $userService;

  public function __construct(UserService $userService) {
    $this->userService = $userService;
  }

  public function index() {
    $users = $this->userService->getAllUsers();
    echo json_encode($users);
  }

  public function create($data) {
    $this->userService->createUser($data);
    echo json_encode(['message' => 'User created successfully']);
  }

  public function edit($id) {
    $user = $this->userService->getUserById($id);

    if (!$user) {
      echo json_encode(['error' => 'User not found']);
      return;
    }

    echo json_encode($user);
  }

  public function update($id, $data) {
    $this->userService->updateUser($id, $data);
    echo json_encode(['message' => 'User updated successfully']);
  }

  public function delete($id) {
    $this->userService->deleteUser($id);
    echo json_encode(['message' => 'User deleted successfully']);
  }
}

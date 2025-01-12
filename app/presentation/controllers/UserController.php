<?php

namespace App\Presentation\Controllers;

use App\Data\Interfaces\Services\UserServiceInterface;

class UserController {
  private UserServiceInterface $userService;

  public function __construct(UserServiceInterface $userService) {
    $this->userService = $userService;
  }

  public function index() {
    $users = $this->userService->getAllUsers();
    require_once(__DIR__ . '/../views/users/index.php');
  }

  public function createIndex() {
    require_once(__DIR__ . '/../views/users/create.php');
  }

  public function viewIndex($id) {
    header('Location: /users');
  }

  public function post($data) {
    $this->userService->createUser($data);
    header('Location: /users');
  }

  public function updateIndex($id) {
    $user = $this->userService->getUserById($id);
    if (!$user) {
      header('Location: /users');
      exit();
    }

    require_once(__DIR__ . '/../views/users/edit.php');
  }

  public function update($id, $data) {
    $this->userService->updateUser($id, $data);
    header('Location: /users');
  }

  public function delete($id) {
    $this->userService->deleteUser($id);
    header('Location: /users');
  }
}

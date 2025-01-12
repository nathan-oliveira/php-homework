<?php

namespace App\Main\Factories;

use PDO;
use App\Data\Repositories\UserRepository;
use App\Domain\Services\UserService;
use App\Presentation\Controllers\UserController;

class MakeUserController {
  private PDO $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function handler() {
    $userRepository = new UserRepository($this->pdo);
    $userService = new UserService($userRepository);
    return new UserController($userService);
  }
}
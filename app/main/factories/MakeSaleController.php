<?php

namespace App\Main\Factories;

use PDO;
use App\Data\Repositories\SaleRepository;
use App\Data\Repositories\UserRepository;
use App\Domain\Services\SaleService;
use App\Domain\Services\UserService;
use App\Presentation\Controllers\SaleController;

class MakeSaleController {
  private PDO $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function handler() {
    $saleRepository = new SaleRepository($this->pdo);
    $userRepository = new UserRepository($this->pdo);
    $saleService = new SaleService($saleRepository);
    $userService = new UserService($userRepository);
    return new SaleController($saleService, $userService);
  }
}
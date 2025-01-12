<?php

namespace App\Presentation\Controllers;

use App\Data\Interfaces\Services\SaleServiceInterface;
use App\Data\Interfaces\Services\UserServiceInterface;

class SaleController {
  private SaleServiceInterface $saleService;
  private UserServiceInterface $userService;

  public function __construct(SaleServiceInterface $saleService, UserServiceInterface $userService) {
    $this->saleService = $saleService;
    $this->userService = $userService;
  }

  public function viewIndex($id) {
    $sales = $this->saleService->getSalesByUserId($id);
    $user = $this->userService->getUserById($id);

    if (!$sales || !$user) {
      header('Location: /users');
      exit();
    }

    require_once(__DIR__ . '/../views/sales/index.php');
  }

  public function post($data) {
    $this->saleService->createSale($data);
    header('Location: /users');
  }
}

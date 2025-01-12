<?php

namespace App\Data\Interfaces\Services;

interface SaleServiceInterface {
  public function createSale($data): bool;

  public function getSalesByUserId(int $id): array;
}

<?php

namespace App\Data\Interfaces\Repositories;

use App\Domain\Entities\Sale;

interface SaleRepositoryInterface {
  public function findByUserId(int $id): array;

  public function create(Sale $data): bool;

  public function getTotalSalesForToday(): array;
}

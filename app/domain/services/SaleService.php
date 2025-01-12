<?php

namespace App\Domain\Services;

use App\Data\Interfaces\Repositories\SaleRepositoryInterface;
use App\Data\Interfaces\Services\SaleServiceInterface;
use App\Domain\Entities\Sale;

class SaleService implements SaleServiceInterface {
  private SaleRepositoryInterface $saleRepository;

  public function __construct(SaleRepositoryInterface $saleRepository) {
    $this->saleRepository = $saleRepository;
  }

  public function createSale($sale): bool {
    $normalizedSalePrice = str_replace(['.', ','], ['', '.'], $sale['sale_price']);
    $salePrice = (float)$normalizedSalePrice;
    $sale['sale_price'] = $salePrice;

    $sale = new Sale(null, $sale['user_id'], $sale['sale_price'], null, null);

    return $this->saleRepository->create($sale);
  }

  public function getSalesByUserId(int $id): array {
    $sales = $this->saleRepository->findByUserId($id);

    $formattedSales = array_map(function ($sale) {
      $sale->formatSaleDate();
      $sale->formatAndCalculateCommission();
      $sale->formatSalePrice();
      return $sale;
    }, $sales);

    return $formattedSales;
  }
}

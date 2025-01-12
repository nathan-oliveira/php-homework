<?php

namespace App\Data\Repositories;

use PDO;
use App\Data\Interfaces\Repositories\SaleRepositoryInterface;
use App\Domain\Entities\Sale;

class SaleRepository implements SaleRepositoryInterface {
  private PDO $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function findByUserId(int $id): array {
    $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE user_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $salesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sales = [];

    foreach ($salesData as $data) {
      $sales[] = new Sale(
        $data['id'],
        $data['user_id'],
        $data['sale_price'],
        $data['sale_date'],
        null,
      );
    }

    return $sales;
  }

  public function create(Sale $sales): bool {
    $stmt = $this->pdo->prepare("INSERT INTO sales (user_id, sale_price) VALUES (:user_id, :sale_price)");

    $userId = $sales->getUserId();
    $salePrice = $sales->getSalePrice();

    $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
    $stmt->bindParam(':sale_price', $salePrice, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function getTotalSalesForToday(): array {
    $today = date('Y-m-d');
    $stmt = $this->pdo->prepare("SELECT CONCAT('R$ ', FORMAT(SUM(s.sale_price), 2, 'de_DE')) AS total_sales, s.user_id, u.email as email
      FROM sales s
      INNER JOIN users u ON s.user_id = u.id
      WHERE DATE(s.sale_date) = :today
      GROUP BY s.user_id, u.email");

    $stmt->bindParam(':today', $today, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

<?php

require(__DIR__ . '/../../../vendor/autoload.php');

require(__DIR__ . '/../../infra/database/config.php');

use App\Data\Repositories\SaleRepository;
use App\Domain\Services\EmailService;
use Cron\CronExpression;

$saleRepository = new SaleRepository($pdo);
$emailService = new EmailService();

$cron = CronExpression::factory('59 23 * * *');

if ($cron->isDue()) {
  $sales = $saleRepository->getTotalSalesForToday();

  foreach ($sales as $sale) {
    $emailService->sendSalesReport($sale['email'], $sale['total_sales']);
  }
}

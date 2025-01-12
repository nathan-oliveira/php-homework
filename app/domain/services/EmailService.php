<?php

namespace App\Domain\Services;

class EmailService {
  public function sendSalesReport($mail, $totalSales) {
    $to = $mail;
    $subject = 'Relatório de Vendas do Dia';
    $message = "O total de vendas realizadas no dia de hoje foi: R$ " . number_format($totalSales, 2, ',', '.');
    $headers = 'From: no-reply@seudominio.com';

    return mail($to, $subject, $message, $headers);
  }
}

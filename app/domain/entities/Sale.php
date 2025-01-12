<?php

namespace App\Domain\Entities;

use DateTime;

class Sale {
  private $id;
  private $userId;
  private $salePrice;
  private $saleDate;
  private $commission;

  public function __construct($id, $userId, $salePrice, $saleDate, $commission) {
    $this->id = $id;
    $this->userId = $userId;
    $this->salePrice = $salePrice;
    $this->saleDate = $saleDate;
    $this->commission = $commission;
  }

  public function getId() {
    return $this->id;
  }

  public function getUserId() {
    return $this->userId;
  }

  public function getSalePrice() {
    return $this->salePrice;
  }

  public function getSaleDate() {
    return $this->saleDate;
  }

  public function getCommission() {
    return $this->commission;
  }

  public function setSalePrice($salePrice) {
    $this->salePrice = $salePrice;
  }

  public function setSaleDate($saleDate) {
    $this->saleDate = $saleDate;
  }

  public function setCommission($commission) {
    $this->commission = $commission;
  }

  public function formatSaleDate() {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $this->saleDate);
    $saleDateFormatted = $date ? $date->format('d/m/Y H:i:s') : $this->saleDate;
    $this->setSaleDate($saleDateFormatted);
  }

  public function formatAndCalculateCommission() {
    $commissionValue =  $this->salePrice * 0.085;
    $commissionFormatted = 'R$ ' . number_format($commissionValue, 2, ',', '.');
    $this->setCommission($commissionFormatted);
  }

  public function formatSalePrice() {
    $salePriceFormatted = 'R$ ' . number_format($this->salePrice, 2, ',', '.');
    $this->setSalePrice($salePriceFormatted);
  }
}

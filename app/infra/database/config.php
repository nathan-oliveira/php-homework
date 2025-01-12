<?php

namespace Infra\Database;

use PDO;
use PDOException;
use Dotenv\Dotenv;

require(__DIR__ . '/../../../vendor/autoload.php');

$rootPath = realpath(__DIR__ . '/../../../');
$dotenv = Dotenv::createImmutable($rootPath);
$dotenv->load();

$dsn = "mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT_INTERNAL']};dbname={$_ENV['DB_DATABASE']};charset=utf8";

try {
  $pdo = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e;
  die("Erro na conexão: " . $e->getMessage());
}

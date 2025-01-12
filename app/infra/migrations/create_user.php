<?php

require(__DIR__ . '/../../infra/database/config.php');

$sql = "
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  removed_at TIMESTAMP DEFAULT null
)";

try {
  $pdo->exec($sql);
} catch (PDOException $e) {
  echo "Erro ao criar tabela 'users' " . $e->getMessage();
}

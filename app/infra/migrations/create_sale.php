<?php

require(__DIR__ . '/../../infra/database/config.php');

$sql = "
CREATE TABLE IF NOT EXISTS sales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  sale_price FLOAT NOT NULL DEFAULT 0,
  sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id)
)
";

try {
  $pdo->exec($sql);
} catch (PDOException $e) {
  echo "Erro ao criar tabela 'sales' " . $e->getMessage();
}

<?php

namespace App\Data\Repositories;

use PDO;
use App\Domain\Entities\User;
use App\Data\Interfaces\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
  private PDO $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function all(): array {
    $stmt = $this->pdo->query("SELECT * FROM users where removed_at is null");
    $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $users = [];
    foreach ($usersData as $data) {
      $users[] = new User($data['id'], $data['name'], $data['email']);
    }

    return $users;
  }

  public function find(int $id): ?User {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
      return new User($data['id'], $data['name'], $data['email']);
    }

    return null;
  }

  public function create(User $user): bool {
    $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");

    $name = $user->getName();
    $email = $user->getEmail();

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function update(int $id, User $user): bool {
    $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");

    $name = $user->getName();
    $email = $user->getEmail();

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function delete(int $id): bool {
    $stmt = $this->pdo->prepare("UPDATE users SET removed_at = CURRENT_TIMESTAMP WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}

<?php

namespace App\Presentation\Routes;

use App\Presentation\Controllers\DefaultController;
use App\Main\Factories\MakeUserController;
use App\Main\Factories\MakeSaleController;

class RouterSetup {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function handleRequest() {
    $request = trim($_SERVER['REQUEST_URI'], '/');
    $parts = explode('/', $request);

    $controllerName = $parts[0] ?? '';
    $action = $parts[1] ?? 'index';
    $id = $parts[2] ?? null;

    $controller = $this->getController($controllerName);
    $this->invokeAction($controller, $action, $id);
  }

  private function getController($controllerName) {
    switch ($controllerName) {
      case 'users':
        $makeController = new MakeUserController($this->pdo);
        return $makeController->handler();
      case 'sales':
        $makeController = new MakeSaleController($this->pdo);
        return $makeController->handler();
      default:
        return new DefaultController();
    }
  }

  private function invokeAction($controller, $action, $id) {
    switch ($action) {
      case 'create':
        $controller->createIndex();
        break;
      case 'edit':
        $controller->updateIndex($id);
        break;
      case 'view':
        $controller->viewIndex($id);
        break;
      case 'post':
        $data = $_POST;
        $controller->post($data);
        break;
      case 'update':
        $data = $_POST;
        $controller->update($id, $data);
        break;
      case 'delete':
        $controller->delete($id);
        break;
      default:
        $controller->index();
        break;
    }
  }
}

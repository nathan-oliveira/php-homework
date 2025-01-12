<?php

namespace App\Presentation\Controllers;

class DefaultController {
  public function index() {
    require_once(__DIR__ . '/../views/home/index.php');
  }

  public function viewIndex($id) {
    require_once(__DIR__ . '/../views/home/index.php');
  }
}

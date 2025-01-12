<?php

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../app/infra/database/config.php');
require_once(__DIR__ . '/../app/main/includes/defines.php');
require_once(__DIR__ . '/../app/infra/scheduler/scheduler.php');

use \App\Presentation\Routes\RouterSetup;

$router = new RouterSetup($pdo);
$router->handleRequest();

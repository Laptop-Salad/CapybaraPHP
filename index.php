<?php

use Routing\RouteController;

require_once 'vendor/autoload.php';
require "note/routing/routes.php";

$controller_string = RouteController::getInstance()->getController($_SERVER['REQUEST_URI']);
$controller = new $controller_string();

$controller->mount();

include $controller->render();
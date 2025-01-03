<?php

require_once 'vendor/autoload.php';

$controller = new \Controllers\IndexController();

$controller->mount();
$controller->render();
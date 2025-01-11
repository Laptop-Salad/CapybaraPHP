<?php

namespace Routing;

class Route {
    public string $name;
    public \Base\Controller $controller;

    public function __construct(string $name, \Base\Controller $controller) {
        $this->name = $name;
        $this->controller = $controller;
    }

    public static function addRoute(string $name, string $controller): void {
        RouteController::getInstance()->addRoute($name, $controller);
    }
}
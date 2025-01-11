<?php

namespace Routing;

class RouteController {
    public static self $instance;
    public array $routes;

    public function addRoute(string $name, string $controller): void {
        $this->routes[$name] = $controller;
    }

    public function getController(string $route): string {
        return $this->routes[$route];
    }

    public static function getInstance(): self {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
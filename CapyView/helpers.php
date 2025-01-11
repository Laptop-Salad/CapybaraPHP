<?php

namespace CapyView;

function view(string $view, array $variables = []) {
    $compiler = new Compiler($view, $variables);

    return $compiler->compile();
}
<?php

namespace CapyView;

class Compiler {
    public $path;

    public function __construct($path) {
        $this->path = $path;
    }

    public function compile() {
        $contents = file_get_contents($this->path);

        return $contents;
    }
}
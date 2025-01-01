<?php

namespace CapyView;

class Token {
    public Character $type;
    public string $character;

    public function __construct(Character $type, string $character) {
        $this->type = $type;
        $this->character = $character;
    }

    public function compile() {
        return $this->type->compile($this->character);
    }
}
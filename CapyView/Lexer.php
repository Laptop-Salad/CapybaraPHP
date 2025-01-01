<?php

namespace CapyView;

class Lexer {
    private array $contents;
    private int $contents_length;
    private int $index = 0;
    private array $lexed = [];

    public function __construct(string $contents) {
        $this->contents = str_split($contents);
        $this->contents_length = count($this->contents);
    }

    public function lex() {
        while ($this->hasNext()) {
            $this->eat(Character::NORMAL, $this->getCurrent());
            $this->next();
        }
    }

    public function eat(Character $type, $character) {
        $this->lexed[] = new Token($type, $character);
    }

    public function peek(int $length = 1): array {
        return array_slice($this->contents, $this->index, $length);
    }

    private function hasNext() {
        return $this->index + 1 < $this->contents_length;
    }

    private function next() {
        $this->index++;
    }

    public function getCurrent() {
        return $this->contents[$this->index];
    }


    public function getLexed() { return $this->lexed; }
}
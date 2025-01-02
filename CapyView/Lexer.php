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
            if ($this->peek(2) === "{%") {
                $this->eatPHP();
            } else {
                $this->eat(Character::OTHER, $this->getCurrent());
            }

            $this->next();
        }
    }

    public function eatPHP() {
        $characters = "";

        while ($this->getCurrent() === "{" || $this->getCurrent() === " " || $this->getCurrent() === "%" ) {
            $this->next();
        }


        if ($this->peek(2) === "if") {
            $type = Character::IF;
        } elseif ($this->peek(4) === "else") {
            $type = Character::ELSE;
        } elseif ($this->peek(5) === "endif") {
            $type = Character::ENDIF;
        } elseif ($this->peek(6) === "elseif") {
            $type = Character::ELSEIF;
        } else {
            return;
        }

        while ($this->getCurrent() !== "%") {
            $characters .= $this->getCurrent();
            $this->next();
        }

        $this->next();

        $this->eat($type, $characters);
    }

    public function eat(Character $type, $character) {
        $this->lexed[] = new Token($type, $character);
    }

    public function peek(int $length = 1): string {
        return implode(array_slice($this->contents, $this->index, $length));
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
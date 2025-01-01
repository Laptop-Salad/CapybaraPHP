<?php

namespace CapyView;

class Compiler {
    public $path;

    public function __construct($path) {
        $this->path = $path;
    }

    public function compile() {
        $contents = file_get_contents($this->path);

        $lexer = new Lexer($contents);
        $lexer->lex();
        $tokens = $lexer->getLexed();

        $final = fopen(__DIR__ . "/../note/compiled/final.php", "w");

        foreach ($tokens as $token) {
            fwrite($final, $token->compile());
        }

        fclose($final);

        return __DIR__ . "/../note/compiled/final.php";
    }
}
<?php

namespace CapyView;

class Compiler {
    public $path;
    public $variables;

    public function __construct($path, $variables) {
        $this->path = $path;
        $this->variables = $variables;
    }

    public function compile() {
        $contents = file_get_contents($this->path);
        $final = $this->getCompiledFile();

        // get tokens from file
        $lexer = new Lexer($contents);
        $lexer->lex();
        $tokens = $lexer->getLexed();

        // smack variables from class at the top
        foreach ($this->variables as $key => $value) {
            if ($value === null) {
                $value = 'null';
            } elseif (is_string($value)) {
                $value = '"' . $value . '"';
            }

            $variable = "<?php \${$key} = {$value}; ?>\n";

            fwrite($final, $variable);
        }

        // compile tokens
        foreach ($tokens as $token) {
            fwrite($final, $token->compile());
        }

        fclose($final);

        return __DIR__ . "/../note/compiled/final.php";
    }

    private function getCompiledFile() {
        return fopen(__DIR__ . "/../note/compiled/final.php", "w");
    }
}
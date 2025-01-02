<?php

namespace CapyView;

enum Character: string
{
    case OTHER = "";
    case IF = "if";
    case ELSE = "else";
    case ELSEIF = "elseif";
    case ENDIF = "endif";

    public function compile($string) {
        return match ($this) {
            self::IF,
            self::ELSE,
            self::ELSEIF => $this->withPHPColon($string),
            self::ENDIF => $this->withPHPSemicolon($string),
            default => $string,
        };
    }

    public function withPHPColon($string) {
        return "<?php {$string}: ?>";
    }

    public function withPHPSemicolon($string) {
        return "<?php {$string}; ?>";
    }

    public function inPHPTag($string) {
        return "<?php {$string} ?>";
    }
}
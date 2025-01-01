<?php

namespace CapyView;

enum Character: int
{
    case NORMAL = 1;

    public function compile($string) {
        return match ($this) {
            self::NORMAL => $string,
        };
    }
}
<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use ClansOfCaledonia\Good\Milk;

abstract class Good
{
    abstract static function name(): string;

    public static function milk(): self
    {
        return new Milk;
    }

    public function isMilk(): bool
    {
        return false;
    }
}

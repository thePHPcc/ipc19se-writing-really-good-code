<?php declare(strict_types=1);

namespace ClansOfCaledonia;

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

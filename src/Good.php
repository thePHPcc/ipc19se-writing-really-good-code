<?php declare(strict_types=1);
namespace ClansOfCaledonia;

abstract class Good
{
    public static function milk(): self
    {
        return new Milk;
    }

    public function isMilk(): bool
    {
        return false;
    }
}

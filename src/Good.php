<?php declare(strict_types=1);
namespace ClansOfCaledonia;

abstract class Good
{
    public static function milk(): self
    {
        return new Milk;
    }

    public static function wool(): self
    {
        return new Wool;
    }

    public function isMilk(): bool
    {
        return false;
    }


    public function isWool(): bool
    {
        return false;
    }
}

<?php declare(strict_types=1);

namespace ClansOfCaledonia;

final class Milk extends Good
{
    public static function name(): string
    {
        return 'Milk';
    }

    public function isMilk(): bool
    {
        return true;
    }
}

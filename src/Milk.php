<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Milk extends Good
{
    public function isMilk(): bool
    {
        return true;
    }
}

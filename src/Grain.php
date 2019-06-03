<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Grain extends Good
{
    public function isGrain(): bool
    {
        return true;
    }
}

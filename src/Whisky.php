<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Whisky extends Good
{
    public function isWhisky(): bool
    {
        return true;
    }
}

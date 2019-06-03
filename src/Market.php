<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Market
{
    public function priceFor(Good $milk): Pound
    {
        return new Pound(5);
    }
}

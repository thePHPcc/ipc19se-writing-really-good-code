<?php declare(strict_types=1);

namespace ClansOfCaledonia;

final class PriceListBuilder
{
    public function milkPrices(): PriceList
    {
        return PriceList::fromList(
            $initPosition = 3,
            new Pound(3),
            new Pound(4),
            new Pound(5),
            new Pound(5),
            new Pound(6),
            new Pound(6),
            new Pound(7),
            new Pound(7),
            new Pound(8),
            new Pound(8)
        );
    }

    public function woolPrices(): PriceList
    {
        return PriceList::fromList(
            $initPosition = 3,
            new Pound(3),
            new Pound(3),
            new Pound(4),
            new Pound(4),
            new Pound(5),
            new Pound(5),
            new Pound(6),
            new Pound(6),
            new Pound(7),
            new Pound(8)
        );
    }

    public function grainPrices(): PriceList
    {
        return PriceList::fromList(
            $initPosition = 3,
            new Pound(3),
            new Pound(3),
            new Pound(4),
            new Pound(5),
            new Pound(6),
            new Pound(6),
            new Pound(7),
            new Pound(7),
            new Pound(8),
            new Pound(8)
        );
    }
}

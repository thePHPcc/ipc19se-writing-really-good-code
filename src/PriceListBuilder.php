<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class PriceListBuilder
{
    public static function milkPrices(): PriceList
    {
        return PriceList::fromList(
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

    public static function woolPrices(): PriceList
    {
        return PriceList::fromList(
            new Pound(1),
            new Pound(2),
            new Pound(3),
            new Pound(3),
            new Pound(4),
            new Pound(5),
            new Pound(6),
            new Pound(7),
            new Pound(33),
            new Pound(99)
        );
    }
}

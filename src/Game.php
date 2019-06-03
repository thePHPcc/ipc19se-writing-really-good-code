<?php

declare(strict_types=1);

namespace ClansOfCaledonia;

use ClansOfCaledonia\Good\Grain;
use ClansOfCaledonia\Good\Milk;
use ClansOfCaledonia\Good\Wool;

final class Game
{
    const GOODS = [ // TODO: Improve this
        'Milk',
        'Wool',
        'Grain',
    ];

    public static function main(Pound $money): void
    {
        $priceBuilder = new PriceListBuilder();

        $market = (new Market)
            ->withPriceList(Milk::name(), $priceBuilder->milkPrices())
            ->withPriceList(Wool::name(), $priceBuilder->woolPrices())
            ->withPriceList(Grain::name(), $priceBuilder->grainPrices());

        $player = new Player($money, $market);
        while (true) {
            echo sprintf('You have %i pounds', $player->money());
            $goodName = readline(sprintf('What do you want to buy now? (%s)', implode(',', self::GOODS)));
            $amount = (int)readline('How many pounds?');
            $player->buy(new Unit($amount), Good::byName($goodName));
            static::printMarket($market);
            sleep(1);
        }
    }

    private static function printMarket(Market $market)
    {
        foreach($market->allPriceList() as $goodName => $priceList){
            echo $goodName.PHP_EOL;
            foreach($priceList as $price) {
                // display the table
            }
            echo PHP_EOL;
        }
    }
}

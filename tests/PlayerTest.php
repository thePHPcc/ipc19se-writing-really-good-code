<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use ClansOfCaledonia\Good\Milk;
use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Player
 *
 * @uses   \ClansOfCaledonia\Market
 */
final class PlayerTest extends TestCase
{
    public function testPlayerPoundsGetReducesAfterBuyingAGood(): void
    {
        $good = Good::milk();
        $market = (new Market)
            ->withPriceList(
                $good::name(),
                PriceList::fromList(
                    $initPosition = 0,
                    new Pound(10),
                    new Pound(20),
                    new Pound(30),
                    new Pound(40),
                    new Pound(50)
                ));

        $initPounds = new Pound(100);
        $player = new Player($initPounds, $market);
        $player->buy(new Unit(2), Good::milk());

        $this->assertEquals(new Pound(80), $player->money());
        $this->assertEquals(new Pound(30), $market->priceFor($good));
    }

}

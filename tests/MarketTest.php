<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Market
 *
 * @uses \ClansOfCaledonia\Pound
 * @uses \ClansOfCaledonia\Good
 * @uses \ClansOfCaledonia\Offer
 * @uses \ClansOfCaledonia\Unit
 */
final class MarketTest extends TestCase
{
    public function testMilkCosts5PoundsInitially(): void
    {
        $market = new Market;

        $this->assertEquals(new Pound(5), $market->priceFor(Good::milk()));
    }

    public function testMilkCanBeSoldToTheMarket(): void
    {
        $market = new Market;

        $payment = $market->sellTo(
            new Offer(
                new Unit(1),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(5), $payment);
    }
}

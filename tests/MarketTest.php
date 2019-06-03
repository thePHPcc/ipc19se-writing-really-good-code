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

        $milkPrices = $market->getMilkPrices();

        $this->assertEquals(new Pound(5), $milkPrices->current());
    }

    public function testMilkCanBeSoldToTheMarket(): Market
    {
        $market = new Market;

        $payment = $market->sellTo(
            new Offer(
                new Unit(2),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(10), $payment);

        return $market;
    }

    public function testMilkCanBeBoughtFromTheMarket(): Market
    {
        $market = new Market;

        $payment = $market->buyFrom(
            new Offer(
                new Unit(2),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(10), $payment);

        return $market;
    }

    /**
     * @depends testMilkCanBeSoldToTheMarket
     */
    public function testSellingMilkToTheMarketReducesMilkPrice(Market $market): void
    {
        $this->assertEquals(new Pound(4), $market->priceFor(Good::milk()));
    }

    /**
     * @depends testMilkCanBeBoughtFromTheMarket
     */
    public function testBuyingMilkFromTheMarketIncreasesMilkPrice(Market $market): void
    {
        $this->assertEquals(new Pound(6), $market->priceFor(Good::milk()));
    }
}

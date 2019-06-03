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
        $market = $this->createMarket();

        $this->assertEquals(new Pound(5), $market->priceFor(Good::milk()));
    }

    public function testMilkCanBeSoldToTheMarket(): Market
    {
        $market = $this->createMarket();

        $payment = $market->sellTo(
            new Offer(
                new Unit(2),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(10), $payment);

        return $market;
    }

    public function testMilkCanBeBoughtFromTheMarket()
    {
        $market = $this->createMarket();

        $payment = $market->buyFrom(
            new Offer(
                new Unit(3),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(10), $payment);

    }

    /**
     * @depends testMilkCanBeSoldToTheMarket
     */
    public function testSellingMilkToTheMarketReducesMilkPrice(Market $market): void
    {
        $this->assertEquals(new Pound(4), $market->priceFor(Good::milk()));
    }

    public function testWhiskyCanBeSoldToTheMarket(): Market
    {
        $market = $this->createMarket();

        $payment = $market->sellTo(
            new Offer(
                new Unit(3),
                Good::whisky()
            )
        );

        $this->assertEquals(new Pound(33), $payment);

        return $market;
    }

    /**
     * @return Market
     */
    protected function createMarket(): Market
    {
        $builder = new PriceListBuilder();
        return new Market($builder->milkPrices(), $builder->whiskyPrices());
    }
}

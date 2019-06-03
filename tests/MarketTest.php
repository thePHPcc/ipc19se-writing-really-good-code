<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Market
 *
 * @uses   \ClansOfCaledonia\Pound
 * @uses   \ClansOfCaledonia\Good
 * @uses   \ClansOfCaledonia\Milk
 * @uses   \ClansOfCaledonia\Offer
 * @uses   \ClansOfCaledonia\Quantity
 * @uses   \ClansOfCaledonia\PriceListBuilder
 * @uses   \ClansOfCaledonia\PriceList
 */
final class MarketTest extends TestCase
{
    public function testMilkCosts5PoundsInitially(): void
    {
        $market = new Market(new PriceListBuilder());

        $this->assertEquals(new Pound(5), $market->priceFor(Good::milk()));
    }

    public function testMilkCanBeSoldToTheMarket(): Market
    {
        $market = new Market(new PriceListBuilder());
        $this->assertEquals(new Pound(5), $market->priceFor(Good::milk()));

        $payment = $market->sellTo(
            new Offer(
                new Quantity(2),
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
        //simulate a second sell because the current price is 5 and equels the default price
        $market->sellTo(
            new Offer(
                new Quantity(2),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(4), $market->priceFor(Good::milk()));
    }

    public function testBuyGoods(): Market
    {
        $market = new Market(new PriceListBuilder());
        $this->assertEquals(new Pound(5), $market->priceFor(Good::milk()));

        $pound = $market->buyTo(
            new Offer(
                new Quantity(2),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(10), $pound);

        return $market;
    }

    /**
     * @depends testBuyGoods
     */
    public function testBuyGoodsIncreasePrice(Market $market)
    {
        $this->assertEquals(new Pound(6), $market->priceFor(Good::milk()));
    }
}

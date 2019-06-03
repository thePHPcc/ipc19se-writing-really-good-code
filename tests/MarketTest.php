<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Market
 * @covers \ClansOfCaledonia\PriceListBuilder
 *
 * @uses \ClansOfCaledonia\Pound
 * @uses \ClansOfCaledonia\Good
 * @uses \ClansOfCaledonia\Offer
 * @uses \ClansOfCaledonia\Quantity
 * @uses \ClansOfCaledonia\PriceList
 */
final class MarketTest extends TestCase
{

    /**
     * @dataProvider initialGoodProvider
     */
    public function testInitiallyGoodCost(Good $good, int $amount): void
    {
        $market = new Market;

        $this->assertEquals(new Pound($amount), $market->priceFor($good));
    }

    public function testMilkCanBeSoldToTheMarket(): Market
    {
        $market = new Market;

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
        $this->assertEquals(new Pound(4), $market->priceFor(Good::milk()));
    }

    public function testWoolCanBeSoldToTheMarket(): Market
    {
        $market = new Market;

        $payment = $market->sellTo(
            new Offer(
                new Quantity(1),
                Good::wool()
            )
        );

        $this->assertEquals(new Pound(4), $payment);

        return $market;
    }

    /**
     * @depends testWoolCanBeSoldToTheMarket
     */
    public function testSellingWoolToTheMarketReducesWoolPrice(Market $market): void
    {
        $this->assertEquals(new Pound(4), $market->priceFor(Good::wool()));
    }


    public function initialGoodProvider()
    {
        return [
            'initialMilkCosts5Pound' => [Good::milk(), 5],
            'initialWoolCosts4Pound' => [Good::wool(), 4],
        ];
    }
}

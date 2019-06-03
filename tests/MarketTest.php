<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Market
 *
 * @uses   \ClansOfCaledonia\Pound
 * @uses   \ClansOfCaledonia\Good
 * @uses   \ClansOfCaledonia\Offer
 * @uses   \ClansOfCaledonia\Unit
 */
final class MarketTest extends TestCase
{
    /** @var Market */
    private $market;

    public function setUp(): void
    {
        $this->market = (new Market)
            ->withPriceList(
                Milk::name(),
                PriceList::fromList(
                    $initPosition = 0,
                    new Pound(10),
                    new Pound(20),
                    new Pound(30),
                    new Pound(40),
                    new Pound(50),
                    )
            );
    }

    public function testMilkCosts5PoundsInitially(): void
    {
        $this->assertEquals(new Pound(10), $this->market->priceFor(Good::milk()));
    }

    public function testMilkCanBeSoldToTheMarket(): Market
    {
        $payment = $this->market->sellTo(
            new Offer(
                new Unit(3),
                Good::milk()
            )
        );

        $this->assertEquals(new Pound(30), $payment);

        return $this->market;
    }

    /**
     * @depends testMilkCanBeSoldToTheMarket
     */
    public function testSellingMilkToTheMarketReducesMilkPrice(Market $market): void
    {
        $this->assertEquals(new Pound(40), $market->priceFor(Good::milk()));
    }
}

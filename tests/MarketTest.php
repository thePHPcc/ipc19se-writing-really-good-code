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
 * @uses \ClansOfCaledonia\PriceList
 * @uses \ClansOfCaledonia\PriceListCollection
 * @uses \ClansOfCaledonia\PriceListBuilder
 */
final class MarketTest extends TestCase
{
    public function testMilkCosts5PoundsInitially(): void
    {
        $milk = new Milk();
        $priceListBuilder = new PriceListBuilder();
        $milkPrices = $priceListBuilder->milkPrices();

        $priceListCollection = new PriceListCollection();
        $priceListCollection->registerPriceListForGood($milk, $milkPrices);

        $market = new Market($priceListCollection);

        $this->assertEquals(new Pound(5), $market->priceFor($milk));
    }

    public function testMilkCanBeSoldToTheMarket(): Market
    {
        $milk = new Milk();
        $priceListBuilder = new PriceListBuilder();
        $milkPrices = $priceListBuilder->milkPrices();

        $priceListCollection = new PriceListCollection();
        $priceListCollection->registerPriceListForGood($milk, $milkPrices);

        $market = new Market($priceListCollection);

        $payment = $market->sellTo(
            new Offer(
                new Unit(2),
                $milk
            )
        );

        $this->assertEquals(new Pound(10), $payment);

        return $market;
    }

    public function testSellingMilkToTheMarketReducesMilkPrice(): void
    {
        $milk = new Milk();
        $priceListBuilder = new PriceListBuilder();
        $milkPrices = $priceListBuilder->milkPrices();

        $priceListCollection = new PriceListCollection();
        $priceListCollection->registerPriceListForGood($milk, $milkPrices);

        $market = new Market($priceListCollection);

        $offer = new Offer(
            new Unit(3),
            $milk
        );

        $market->sellTo($offer);

        $this->assertEquals(new Pound(3), $milkPrices->current());
    }

    public function testBuyingMilkFromTheMarketIncresesMilkPrice(): void
    {
        $milk = new Milk();
        $priceListBuilder = new PriceListBuilder();
        $milkPrices = $priceListBuilder->milkPrices();

        $priceListCollection = new PriceListCollection();
        $priceListCollection->registerPriceListForGood($milk, $milkPrices);

        $market = new Market($priceListCollection);

        $offer = new Offer(
            new Unit(3),
            $milk
        );

        $market->buyFrom($offer);

        $this->assertEquals(new Pound(7), $milkPrices->current());
    }
}

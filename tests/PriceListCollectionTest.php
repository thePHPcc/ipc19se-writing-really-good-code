<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\PriceListCollection
 *
 * @uses \ClansOfCaledonia\PriceList
 * @uses \ClansOfCaledonia\PriceListBuilder
 * @uses \ClansOfCaledonia\Milk
 * @uses \ClansOfCaledonia\Wool
 * @uses \ClansOfCaledonia\Pound
 */
final class PriceListCollectionTest extends TestCase
{
    public function testRegisterPriceListForGood(): void
    {
        $milk = new Milk();
        $priceListBuilder = new PriceListBuilder;
        $milkPriceList = $priceListBuilder->milkPrices();
        $priceListCollection = new PriceListCollection();
        $priceListCollection->registerPriceListForGood(new Milk(), $milkPriceList);

        $this->assertEquals($milkPriceList->current(), $priceListCollection->currentFor($milk));
    }

    public function testMoveForGood(): void
    {
        $position = 3;
        $milk = new Milk();
        $priceListBuilder = new PriceListBuilder;
        $milkPriceList = $priceListBuilder->milkPrices();
        $priceListCollection = new PriceListCollection();
        $priceListCollection->registerPriceListForGood(new Milk(), $milkPriceList);
        $priceListCollection->moveFor($milk, $position);

        $this->assertEquals($milkPriceList->current(), $priceListCollection->currentFor($milk));
    }

    public function testUnregisteredGood(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $position = 3;
        $wool = new Wool();
        $priceListBuilder = new PriceListBuilder;
        $milkPriceList = $priceListBuilder->milkPrices();
        $priceListCollection = new PriceListCollection();
        $priceListCollection->registerPriceListForGood(new Milk(), $milkPriceList);
        $priceListCollection->moveFor($wool, $position);
    }
}
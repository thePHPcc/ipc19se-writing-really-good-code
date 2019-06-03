<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\PriceList
 *
 * @uses \ClansOfCaledonia\Pound
 */
final class PriceListTest extends TestCase
{
    public function testHasInitialPrice(): void
    {
        $prices = PriceList::fromList(
            new Pound(1),
            new Pound(2),
            new Pound(3),
            new Pound(4),
            new Pound(5),
            new Pound(6),
            new Pound(7),
            new Pound(8),
            new Pound(9),
            new Pound(10)
        );

        $this->assertEquals(new Pound(4), $prices->current());
    }

    public function testInreaseStock()
    {
        $prices = $this->priceList();
        $this->assertEquals(new Pound(4), $prices->current());
        $prices->increaseStock(new Unit(1));
        $this->assertEquals(new Pound(3), $prices->current());
        $prices->increaseStock(new Unit(2));
        $this->assertEquals(new Pound(1), $prices->current());
        $prices->increaseStock(new Unit(1));
        $this->assertEquals(new Pound(1), $prices->current());
    }

    public function testDecreaseStock(): void
    {
        $prices = $this->priceList();
        $this->assertEquals(new Pound(4), $prices->current());
        $prices->decreaseStock(new Unit(1));
        $this->assertEquals(new Pound(5), $prices->current());
        $prices->decreaseStock(new Unit(2));
        $this->assertEquals(new Pound(7), $prices->current());
        $prices->decreaseStock(new Unit(1));
        $this->assertEquals(new Pound(8), $prices->current());
        $prices->decreaseStock(new Unit(2));
        $this->assertEquals(new Pound(10), $prices->current());
        $prices->decreaseStock(new Unit(1));
        $this->assertEquals(new Pound(10), $prices->current());
    }

    public function priceList(): PriceList
    {
        return PriceList::fromList(
            new Pound(1),
            new Pound(2),
            new Pound(3),
            new Pound(4),
            new Pound(5),
            new Pound(6),
            new Pound(7),
            new Pound(8),
            new Pound(9),
            new Pound(10)
        );
    }
}

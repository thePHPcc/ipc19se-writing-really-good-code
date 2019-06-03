<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\PriceList
 *
 * @uses   \ClansOfCaledonia\Pound
 */
final class PriceListTest extends TestCase
{
    public function testHasInitialPrice(): PriceList
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

        return $prices;
    }

    /**
     * @depends testHasInitialPrice
     */
    public function testCountUp(PriceList $prices): PriceList
    {
        $prices->up();

        $this->assertEquals(new Pound(5), $prices->current());

        return $prices;
    }

    /**
     * @depends testCountUp
     */
    public function testCountUpAndRunsNotOutOfIndex(PriceList $prices): PriceList
    {
        for ($x = 0; $x < 10; $x++) {
            $prices->up();
        }

        $this->assertEquals(new Pound(10), $prices->current());

        return $prices;
    }

    /**
     * @depends testCountUpAndRunsNotOutOfIndex
     */
    public function testCountDown(PriceList $prices): PriceList
    {
        $prices->down();

        $this->assertEquals(new Pound(9), $prices->current());

        return $prices;
    }
    /**
     * @depends testCountUpAndRunsNotOutOfIndex
     */
    public function testCountDownRunsNotOutOfIndex(PriceList $prices): void
    {
       for ($x = 0; $x < 20; $x++) {
            $prices->down();
        }

        $this->assertEquals(new Pound(1), $prices->current());
    }
}

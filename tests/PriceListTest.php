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
        $priceList = $this->getTestPriceList();

        $this->assertEquals(new Pound(4), $priceList->current());
    }

    public function testCanDecrementPosition()
    {
        $priceList = $this->getTestPriceList();

        $this->assertEquals(new Pound(4), $priceList->current());
        $priceList->decrement();
        $this->assertEquals(new Pound(3), $priceList->current());
    }


    public function testCanDecremenPositiontByMultipleSteps()
    {
        $priceList = $this->getTestPriceList();

        $this->assertEquals(new Pound(4), $priceList->current());
        $priceList->decrement(3);
        $this->assertEquals(new Pound(1), $priceList->current());
    }



    public function testCanIncrementPosition()
    {
        $priceList = $this->getTestPriceList();

        $this->assertEquals(new Pound(4), $priceList->current());
        $priceList->increment();
        $this->assertEquals(new Pound(5), $priceList->current());
    }


    public function testCanIncrementPositiontByMultipleSteps()
    {
        $priceList = $this->getTestPriceList();

        $this->assertEquals(new Pound(4), $priceList->current());
        $priceList->increment(3);
        $this->assertEquals(new Pound(7), $priceList->current());
    }

    /**
     * @return PriceList
     */
    protected function getTestPriceList(): PriceList
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

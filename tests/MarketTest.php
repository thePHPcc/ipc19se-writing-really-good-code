<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Market
 *
 * @uses \ClansOfCaledonia\Pound
 * @uses \ClansOfCaledonia\Good
 */
final class MarketTest extends TestCase
{
    public function testMilkCosts5PoundsInitially(): void
    {
        $market = new Market;

        $this->assertEquals(new Pound(5), $market->priceFor(Good::milk()));
    }
}

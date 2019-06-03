<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\PriceListBuilder
 *
 * @uses   \ClansOfCaledonia\PriceList
 * @uses   \ClansOfCaledonia\Pound
 */
final class PriceListBuilderTest extends TestCase
{
    public function testCanBuildMilkPriceList(): void
    {
        $builder = new PriceListBuilder;

        $milkPrices = $builder->milkPrices();

        $this->assertEquals(new Pound(5), $milkPrices->current());
    }

    public function testCanBuildWoolPriceList(): void
    {
        $builder = new PriceListBuilder;

        $milkPrices = $builder->woolPrices();

        $this->assertEquals(new Pound(4), $milkPrices->current());
    }

    public function testCanBuildGrainPriceList(): void
    {
        $builder = new PriceListBuilder;

        $milkPrices = $builder->grainPrices();

        $this->assertEquals(new Pound(5), $milkPrices->current());
    }
}

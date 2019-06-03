<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\PriceListBuilder
 *
 * @uses \ClansOfCaledonia\PriceList
 * @uses \ClansOfCaledonia\Pound
 */
final class PriceListBuilderTest extends TestCase
{
    public function testCanBuildMilkPriceList(): void
    {
        $builder = new PriceListBuilder;

        $milkPrices = $builder->milkPrices();

        $this->assertEquals(new Pound(5), $milkPrices->current());
    }

    public function testCanBuildBreadPriceList(): void
    {
        $builder = new PriceListBuilder;

        $breadPrices = $builder->breadPrices();

        $this->assertEquals(new Pound(10), $breadPrices->current());
    }

    public function testCanBuildWoolPriceList(): void
    {
        $builder = new PriceListBuilder;

        $woolPrices = $builder->woolPrices();

        $this->assertEquals(new Pound(4), $woolPrices->current());
    }

    public function testCanBuildCheesePriceList(): void
    {
        $builder = new PriceListBuilder;

        $cheesePrices = $builder->cheesePrices();

        $this->assertEquals(new Pound(10), $cheesePrices->current());
    }

    public function testCanBuildWhiskyPriceList(): void
    {
        $builder = new PriceListBuilder;

        $whiskyPrices = $builder->whiskyPrices();

        $this->assertEquals(new Pound(10), $whiskyPrices->current());
    }

    public function testCanBuildGrainPriceList(): void
    {
        $builder = new PriceListBuilder;

        $grainPrices = $builder->grainPrices();

        $this->assertEquals(new Pound(5), $grainPrices->current());
    }
}

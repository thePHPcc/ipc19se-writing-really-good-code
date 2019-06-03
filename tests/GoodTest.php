<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Good
 * @covers \ClansOfCaledonia\Milk
 */
final class GoodTest extends TestCase
{
    public function testCanBeMilk(): void
    {
        $milk = Good::milk();

        $this->assertTrue($milk->isMilk());
        $this->assertFalse($milk->isWool());
    }


    public function testCanBeWool(): void
    {
        $wool = Good::wool();

        $this->assertTrue($wool->isWool());
        $this->assertFalse($wool->isMilk());
    }
}

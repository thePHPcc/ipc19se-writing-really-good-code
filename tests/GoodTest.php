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
    }
}

<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Pound
 */
final class PoundTest extends TestCase
{
    public function testHasAmount(): void
    {
        $amount = 1234;

        $p = new Pound($amount);

        $this->assertSame($amount, $p->amount());
    }

    public function testCanBeMultipliedByAmount(): void
    {
        $amount = 5;

        $pount = new Pound(5);

        $this->assertEquals(25, $pount->multiplyByAmount($amount));
    }
}

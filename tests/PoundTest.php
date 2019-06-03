<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Pound
 *
 * @uses   \ClansOfCaledonia\Milk
 * @uses   \ClansOfCaledonia\Offer
 * @uses   \ClansOfCaledonia\Quantity
 * @uses   \ClansOfCaledonia\Good
 */
final class PoundTest extends TestCase
{
    public function testHasAmount(): void
    {
        $amount = 1234;

        $p = new Pound($amount);

        $this->assertSame($amount, $p->amount());
    }

    public function testCalcIncreaseThePoundAndThePrice(): void
    {
        $pound = new Pound(100);

        $pound->calc(
            new Offer(
                new Quantity(2),
                Good::milk()
            ),
            new Pound(2)
        );

        $this->assertSame(104, $pound->amount());
    }
}

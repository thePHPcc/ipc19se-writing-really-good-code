<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Quantity
 */
final class QuantityTest extends TestCase
{
    public function testHasAmount(): void
    {
        $quantity = new Quantity(1);

        $this->assertSame(1, $quantity->amount());
    }

    /**
     * @dataProvider invalidAmounts
     */
    public function testAmountMustBeGreaterThan0(int $amount): void
    {
        $this->expectException(OutOfRangeException::class);

        new Quantity($amount);
    }

    public function invalidAmounts(): array
    {
        return [
            [
                0,
                -1,
            ],
        ];
    }
}

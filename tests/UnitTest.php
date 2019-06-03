<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Unit
 */
final class UnitTest extends TestCase
{
    public function testHasAmount(): void
    {
        $unit = new Unit(1);

        $this->assertSame(1, $unit->amount());
    }

    /**
     * @dataProvider invalidAmounts
     */
    public function testAmountMustBeGreaterThan0(int $amount): void
    {
        $this->expectException(OutOfRangeException::class);

        new Unit($amount);
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

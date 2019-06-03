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

    /**
     * @dataProvider multiplyFactors
     */
    public function testCanBeMultiplyByAFactor(int $init, int $factor, int $result): void
    {
        $this->assertEquals(new Pound($result), (new Pound($init))->multiply($factor));
    }

    public function multiplyFactors(): array
    {
        return [
            [2, 2, 4],
            [2, 5, 10],
            [3, 2, 6],
        ];
    }
}

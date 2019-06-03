<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Pound
 *
 * @uses \ClansOfCaledonia\Quantity
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
     * @dataProvider multiplyDataProvider
     */
    public function testPoundCanMultiply(int $amount, Quantity $factor, int $expected)
    {
        $p = new Pound($amount);

        $this->assertSame($expected, $p->multiply($factor)->amount());
    }


    public function multiplyDataProvider()
    {
        return [
            [ 5, new Quantity(2), 10],
            [ 1, new Quantity(100), 100],
            [ -3, new Quantity(4), -12],
        ];
    }
}

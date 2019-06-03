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
     * @dataProvider multiplyDataProvider
     */
    public function testPoundCanMultiply(int $amount, Unit $factor, int $expected)
    {
        $p = new Pound($amount);

        $this->assertSame($expected, $p->multiply($factor)->amount());
    }


    public function multiplyDataProvider()
    {
        return [
            [ 5, new Unit(2), 10],
            [ 1, new Unit(100), 100],
            [ -3, new Unit(4), -12],
        ];
    }
}

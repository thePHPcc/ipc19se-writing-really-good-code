<?php declare(strict_types=1);
namespace ClansOfCaledonia;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ClansOfCaledonia\Offer
 *
 * @uses \ClansOfCaledonia\Good
 * @uses \ClansOfCaledonia\Quantity
 */
final class OfferTest extends TestCase
{
    public function testHasAmount(): void
    {
        $offer = new Offer(new Quantity(1), Good::milk());

        $this->assertEquals(new Quantity(1), $offer->amount());
    }
}

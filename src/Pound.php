<?php declare(strict_types=1);

namespace ClansOfCaledonia;

final class Pound
{
    /**
     * @var int
     */
    private $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function calc(Offer $offer, Pound $courrentPrice): void
    {
        $this->amount += $courrentPrice->amount() * $offer->amount()->amount();
    }
}

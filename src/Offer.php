<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Offer
{
    /**
     * @var Quantity
     */
    private $amount;

    /**
     * @var Good
     */
    private $good;

    public function __construct(Quantity $quantity, Good $good)
    {
        $this->amount = $quantity;
        $this->good   = $good;
    }

    public function amount(): Quantity
    {
        return $this->amount;
    }

    public function good(): Good
    {
        return $this->good;
    }
}

<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Offer
{
    /**
     * @var Unit
     */
    private $amount;

    /**
     * @var Good
     */
    private $good;

    public function __construct(Unit $unit, Good $good)
    {
        $this->amount = $unit;
        $this->good   = $good;
    }

    public function amount(): Unit
    {
        return $this->amount;
    }

    public function good(): Good
    {
        return $this->good;
    }
}

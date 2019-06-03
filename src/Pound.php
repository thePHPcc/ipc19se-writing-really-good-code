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

    public function multiply(Unit $unit): Pound
    {
        return new Pound($this->amount * $unit->amount());
    }
}

<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Unit
{
    /**
     * @var int
     */
    private $amount;

    public function __construct(int $amount)
    {
        $this->ensureIsGreaterThan0($amount);

        $this->amount = $amount;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    private function ensureIsGreaterThan0(int $amount): void
    {
        if ($amount < 1) {
            throw new OutOfRangeException(
                \sprintf(
                    '"%d" is not greater than 0',
                    $amount
                )
            );
        }
    }
}

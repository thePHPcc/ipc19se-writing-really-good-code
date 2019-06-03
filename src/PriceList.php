<?php declare(strict_types=1);

namespace ClansOfCaledonia;

final class PriceList
{
    /**
     * @var Pound[]
     */
    private $prices;

    /**
     * @var int
     */
    private $position;

    public static function fromList(int $initPosition, Pound ...$pounds): self
    {
        return new self($initPosition, $pounds);
    }

    /**
     * @param int $initPosition
     * @param Pound[] $prices
     */
    private function __construct(int $initPosition, array $prices)
    {
        $this->position = $initPosition;
        $this->prices = $prices;
    }

    public function current(): Pound
    {
        return $this->prices[$this->position];
    }

    public function moveTo(Unit $unit): void
    {
        $this->position += $unit->amount();
    }
}

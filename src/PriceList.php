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
    private $position = 3;

    public static function fromList(Pound ...$pounds): self
    {
        return new self($pounds);
    }

    /**
     * @param Pound[] $prices
     */
    private function __construct(array $prices)
    {
        $this->prices = $prices;
    }

    public function current(): Pound
    {
        return $this->prices[$this->position];
    }


    public function increaseStock(Quantity $quantity): void
    {
        $this->position = max($this->position - $quantity->amount(), 0);
    }


    public function decreaseStock(Quantity $quantity): void
    {
        $this->position = min($this->position + $quantity->amount(), count($this->prices)-1);
    }
}

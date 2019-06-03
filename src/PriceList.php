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

    public function move(int $positions): Pound
    {
        $nextPosition = $this->position + $positions;

        if ($nextPosition >= count($this->prices)) {
            $this->position = count($this->prices) - 1;

            return $this->current();
        }

        if ($nextPosition < 0) {
            $this->position = 0;

            return $this->current();
        }

        $this->position = $nextPosition;

        return $this->current();
    }
}

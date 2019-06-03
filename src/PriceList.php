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
}

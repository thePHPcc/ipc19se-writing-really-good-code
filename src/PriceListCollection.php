<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use function get_class;
use InvalidArgumentException;
use function sprintf;

final class PriceListCollection
{
    /** @var PriceList[] */
    private $priceLists;

    public function __construct()
    {
        $this->priceLists = [];
    }

    public function registerPriceListForGood(Good $good, PriceList $priceList): void
    {
        $this->priceLists[get_class($good)] = $priceList;
    }

    public function currentFor(Good $good): Pound
    {
        $this->ensureGoodHasPriceList($good);

        return $this->priceLists[get_class($good)]->current();
    }

    public function moveFor(Good $good, int $positions): Pound
    {
        $this->ensureGoodHasPriceList($good);

        return $this->priceLists[get_class($good)]->move($positions);
    }

    private function ensureGoodHasPriceList(Good $good): void
    {
        if (!isset($this->priceLists[get_class($good)])) {
            throw new InvalidArgumentException(sprintf("Good: %s is unknown", get_class($good)));
        }
    }
}
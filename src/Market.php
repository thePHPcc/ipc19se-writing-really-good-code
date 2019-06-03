<?php declare(strict_types=1);

namespace ClansOfCaledonia;

final class Market
{
    /** @var array[string:PriceList] */
    private $prices;

    public function __construct()
    {
        $this->prices = [];
    }

    public function withPriceList(string $goodName, PriceList $priceList): self
    {
        $this->prices[$goodName] = $priceList;

        return $this;
    }

    public function priceFor(Good $good): Pound
    {
        return $this->prices[$good->name()]->current();
    }

    public function sellTo(Offer $offer): Pound
    {
        $good = $offer->good();
        $unit = $offer->amount();
        $result = $this->priceFor($good)->multiply($unit->amount());
        $this->adjustPrice($good, $unit);

        return $result;
    }

    private function adjustPrice(Good $good, Unit $unit)
    {
        /** @var PriceList $priceList */
        $priceList = $this->prices[$good->name()];
        $priceList->moveTo($unit);
    }
}

<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Market
{
    /** @var PriceList[] */
    private $priceLists = [];

    public function __construct()
    {
        $this->priceLists[Milk::class] = PriceListBuilder::milkPrices();
        $this->priceLists[Wool::class] = PriceListBuilder::woolPrices();
    }


    public function priceFor(Good $good): Pound
    {
        return $this->priceLists[get_class($good)]->current();
    }

    public function sellTo(Offer $offer): Pound
    {
        $profit = $this->priceLists[get_class($offer->good())]->current()->multiply($offer->amount());
        $this->priceLists[get_class($offer->good())]->increaseStock($offer->amount());
        return $profit;
    }
}

<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Market
{
    /** @var PriceList[] */
    private $priceLists = [];

    public function __construct()
    {
        $this->priceLists['milk'] = PriceListBuilder::milkPrices();
    }


    public function priceFor(Good $good): Pound
    {
        return $this->priceLists['milk']->current();
    }

    public function sellTo(Offer $offer): Pound
    {
        $profit = $this->priceLists['milk']->current()->multiply($offer->amount());
        $this->priceLists['milk']->increaseStock($offer->amount());
        return $profit;
    }
}

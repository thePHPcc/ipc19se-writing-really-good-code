<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Market
{
    /** @var PriceListCollection */
    private $priceListCollection;

    public function __construct(PriceListCollection $priceListCollection)
    {
        $this->priceListCollection = $priceListCollection;
    }

    public function priceFor(Good $good): Pound
    {
        return $this->priceListCollection->currentFor($good);
    }

    public function sellTo(Offer $offer): Pound
    {
        $cost = $this
            ->priceFor($offer->good())
            ->mult($offer->amount()->amount());

        $this->priceListCollection->moveFor($offer->good(), -$offer->amount()->amount());

        return $cost;
    }

    public function buyFrom(Offer $offer): Pound
    {
        $cost = $this
            ->priceFor($offer->good())
            ->mult($offer->amount()->amount());

        $this->priceListCollection->moveFor($offer->good(), $offer->amount()->amount());

        return $cost;
    }
}

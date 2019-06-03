<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Market
{
    /**
     * @var PriceList
     */
    private $milkPrices;
    /**
     * @var PriceList
     */
    private $whiskyPrices;

    public function __construct(PriceList $milkPrices, PriceList $whiskyPrices)
    {
        $this->milkPrices = $milkPrices;
        $this->whiskyPrices = $whiskyPrices;
    }

    public function priceFor(Good $good): Pound
    {
        if($good->isMilk()){
            return $this->milkPrices->current();
        }

        if($good->isWhisky()){
            return $this->whiskyPrices->current();
        }
    }

    public function sellTo(Offer $offer): Pound
    {
        return (new Pound(
            $offer->amount()->amount()
        ))
        ->multiply(
            $this->priceFor($offer->good())->amount()
        );
    }
}

<?php declare(strict_types=1);
namespace ClansOfCaledonia;

final class Market
{
    public function priceFor(Good $milk): Pound
    {
        return new Pound(5);
    }

    public function sellTo(Offer $offer): Pound
    {
        return new Pound(
            $offer->amount()->amount() *
            $this->priceFor($offer->good())->amount()
        );
    }
}

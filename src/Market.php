<?php declare(strict_types=1);

namespace ClansOfCaledonia;

final class Market
{
    /**
     * @var PriceList
     */
    private $milkPriceList;

    public function __construct(PriceListBuilder $priceListBuilder)
    {
        $this->milkPriceList = $priceListBuilder->milkPrices();
    }

    public function priceFor(Good $good): Pound
    {
        if ($good->isMilk()) {
            return $this->milkPriceList->current();
        }

        $this->throwInvalidGoodException($good);
    }

    public function buyTo(Offer $offer)
    {
        $pound = new Pound(0);

        $pound->calc($offer, $this->priceFor($offer->good()));

        $this->increasePrice($offer->good());

        return $pound;
    }

    private function reducePrice(Good $good): void
    {
        if ($good->isMilk()) {
            $this->milkPriceList->down();

            return;
        }

        $this->throwInvalidGoodException($good);
    }

    private function increasePrice(Good $good): void
    {
        if ($good->isMilk()) {
            $this->milkPriceList->up();

            return;
        }

        $this->throwInvalidGoodException($good);
    }

    public function sellTo(Offer $offer): Pound
    {
        $pound = new Pound(0);

        $pound->calc($offer, $this->priceFor($offer->good()));

        $this->reducePrice($offer->good());

        return $pound;
    }

    private function throwInvalidGoodException(Good $good)
    {
        throw new UnknownGoodException(
            sprintf(
                'Good with name: "%s" is unkown.',
                get_class($good)
            )
        );
    }
}

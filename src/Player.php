<?php declare(strict_types=1);

namespace ClansOfCaledonia;

final class Player
{
    /** @var Pound */
    private $money;

    /** @var Market */
    private $market;

    public function __construct(Pound $money, Market $market)
    {
        $this->money = $money;
        $this->market = $market;
    }

    public function buy(Unit $unit, Good $good): void
    {
        $payment = $this->market->sellTo(new Offer($unit, $good));
        $this->money = $this->money->minus($payment->amount());
    }

    public function money(): Pound
    {
        return $this->money;
    }
}

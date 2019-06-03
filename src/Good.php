<?php declare(strict_types=1);
namespace ClansOfCaledonia;

abstract class Good
{
    public static function milk(): self
    {
        return new Milk;
    }

    public static function bread(): self
    {
        return new Bread;
    }

    public static function whisky(): self
    {
        return new Whisky;
    }

    public static function cheese(): self
    {
        return new Cheese;
    }

    public static function wool(): self
    {
        return new Wool;
    }

    public static function grain(): self
    {
        return new Grain;
    }

    public function isWhisky(): bool
    {
        return false;
    }

    public function isBread(): bool
    {
        return false;
    }

    public function isWool(): bool
    {
        return false;
    }

    public function isMilk(): bool
    {
        return false;
    }

    public function isCheese(): bool
    {
        return false;
    }
}

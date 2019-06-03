<?php declare(strict_types=1);

namespace ClansOfCaledonia;

use ClansOfCaledonia\Good\Grain;
use ClansOfCaledonia\Good\Milk;
use ClansOfCaledonia\Good\Wool;

abstract class Good
{
    public static function name(): string
    {
        return static::class;
    }

    public static function milk(): self
    {
        return new Milk();
    }

    public static function wool(): self
    {
        return new Wool();
    }

    public static function grain(): self
    {
        return new Grain();
    }

    public static function byName(string $goodName)
    {
        switch ($goodName){
            case Milk::name():
                return self::milk();
            case Wool::name():
                return self::wool();
            case Grain::name():
                return self::grain();
        }

        throw new \Exception('Good Unknown');
    }

    public function isMilk(): bool
    {
        return false;
    }
}

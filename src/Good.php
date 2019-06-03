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

    public function isMilk(): bool
    {
        return false;
    }
}

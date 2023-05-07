<?php

declare(strict_types=1);

namespace BombenProdukt\Countries\Casts;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

final class ArrayCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): array
    {
        if (\is_string($value)) {
            return Arr::wrap($value);
        }

        return $value;
    }
}

<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Countries\Casts;

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

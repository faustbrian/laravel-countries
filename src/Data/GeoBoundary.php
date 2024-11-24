<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Countries\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class GeoBoundary extends Data
{
    public function __construct(
        #[MapInputName('lat')]
        public readonly float $latitude,
        #[MapInputName('lng')]
        public readonly float $longitude,
    ) {
        //
    }
}

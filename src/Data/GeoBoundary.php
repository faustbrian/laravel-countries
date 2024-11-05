<?php

declare(strict_types=1);

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

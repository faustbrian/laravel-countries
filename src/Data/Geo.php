<?php

declare(strict_types=1);

namespace BaseCodeOy\Countries\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Geo extends Data
{
    public function __construct(
        public readonly ?float $latitude,
        public readonly ?float $longitude,
        #[MapInputName('max_latitude')]
        public readonly ?float $maxLatitude,
        #[MapInputName('max_longitude')]
        public readonly ?float $maxLongitude,
        #[MapInputName('min_latitude')]
        public readonly ?float $minLatitude,
        #[MapInputName('min_longitude')]
        public readonly ?float $minLongitude,
        #[DataCollectionOf(GeoBoundary::class)]
        public readonly ?DataCollection $bounds,
    ) {
        //
    }
}

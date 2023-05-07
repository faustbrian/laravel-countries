<?php

declare(strict_types=1);

namespace BombenProdukt\Countries\Data;

use BombenProdukt\Countries\Casts\ArrayCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

final class Subdivision extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $code,
        #[WithCast(ArrayCast::class)]
        #[MapInputName('unofficial_names')]
        public readonly ?array $unofficialNames,
        public readonly ?Geo $geo,
        public readonly array $translations,
        public readonly ?string $comments,
        public readonly string $type,
    ) {
        //
    }
}

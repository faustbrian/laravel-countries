<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Countries\Data;

use BaseCodeOy\Countries\Casts\ArrayCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

final class Subdivision extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $code,
        #[MapInputName('unofficial_names')]
        #[WithCast(ArrayCast::class)]
        public readonly ?array $unofficialNames,
        public readonly ?Geo $geo,
        public readonly array $translations,
        public readonly ?string $comments,
        public readonly string $type,
    ) {
        //
    }
}

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

final class Country extends Data
{
    public function __construct(
        public readonly string $alpha2,
        public readonly string $alpha3,
        public readonly string $continent,
        #[MapInputName('country_code')]
        public readonly string $countryCode,
        #[MapInputName('currency_code')]
        public readonly string $currencyCode,
        public readonly ?string $gec,
        public readonly Geo $geo,
        #[MapInputName('international_prefix')]
        public readonly string $internationalPrefix,
        public readonly ?string $ioc,
        #[MapInputName('iso_long_name')]
        public readonly string $isoLongName,
        #[MapInputName('iso_short_name')]
        public readonly string $isoShortName,
        #[MapInputName('languages_official')]
        public readonly array $languagesOfficial,
        #[MapInputName('languages_spoken')]
        public readonly array $languagesSpoken,
        #[MapInputName('national_destination_code_lengths')]
        public readonly array $nationalDestinationCodeLengths,
        #[MapInputName('national_number_lengths')]
        public readonly array $nationalNumberLengths,
        #[MapInputName('national_prefix')]
        public readonly string $nationalPrefix,
        public readonly string $nationality,
        public readonly string $number,
        #[MapInputName('postal_code')]
        public readonly string $postalCode,
        #[MapInputName('postal_code_format')]
        public readonly ?string $postalCodeFormat,
        public readonly string $region,
        #[MapInputName('start_of_week')]
        public readonly string $startOfWeek,
        public readonly string $subregion,
        #[MapInputName('un_locode')]
        public readonly string $unLocode,
        #[MapInputName('unofficial_names')]
        public readonly array $unofficialNames,
        #[MapInputName('world_region')]
        public readonly string $worldRegion,
    ) {
        //
    }
}

<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Repository;

use BaseCodeOy\Countries\Data\Country;
use BaseCodeOy\Countries\Repository\CountryRepository;
use Illuminate\Support\Collection;

it('should get all countries', function (): void {
    $countries = (new CountryRepository())->all();

    expect($countries)->toBeInstanceOf(Collection::class);
    expect($countries)->toHaveCount(249);
});

it('should find a country by its alpha2 code', function (): void {
    $country = (new CountryRepository())->findByCode('FI');

    expect($country)->toBeInstanceOf(Country::class);
    expect($country->isoShortName)->toBe('Finland');
});

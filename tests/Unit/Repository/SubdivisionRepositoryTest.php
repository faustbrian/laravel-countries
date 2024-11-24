<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Repository;

use BaseCodeOy\Countries\Data\Subdivision;
use BaseCodeOy\Countries\Repository\SubdivisionRepository;
use Illuminate\Support\Collection;

it('should get all countries', function (): void {
    $countries = (new SubdivisionRepository())->all();

    expect($countries)->toBeInstanceOf(Collection::class);
    expect($countries)->toHaveCount(200);
});

it('should find a country by its alpha2 code', function (): void {
    $country = (new SubdivisionRepository())->findByCountryCode('FI');

    expect($country)->toBeInstanceOf(Collection::class);
    expect($country->first())->toBeInstanceOf(Subdivision::class);
    expect($country->first()->name)->toBe('Ahvenanmaan maakunta');
});

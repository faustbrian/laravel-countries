<?php

declare(strict_types=1);

namespace Tests\Unit\Repository;

use BombenProdukt\Countries\Data\Subdivision;
use BombenProdukt\Countries\Repository\SubdivisionRepository;
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

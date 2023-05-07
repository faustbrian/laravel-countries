<?php

declare(strict_types=1);

namespace Tests\Unit\Repository;

use BombenProdukt\Countries\Repository\TranslationRepository;
use Illuminate\Support\Collection;

it('should get all countries', function (): void {
    $translations = (new TranslationRepository())->all();

    expect($translations)->toBeInstanceOf(Collection::class);
    expect($translations)->toHaveCount(131);
});

it('should find a country by its alpha2 code', function (): void {
    $translations = (new TranslationRepository())->findByCountryCode('FI');

    expect($translations)->toBeArray();
    expect($translations['DE'])->toBe('Saksa');
});

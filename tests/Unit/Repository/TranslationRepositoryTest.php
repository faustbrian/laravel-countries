<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Repository;

use BaseCodeOy\Countries\Repository\TranslationRepository;
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

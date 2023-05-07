<?php

declare(strict_types=1);

namespace Tests;

use BombenProdukt\PackagePowerPack\TestBench\AbstractPackageTestCase;
use Spatie\LaravelData\LaravelDataServiceProvider;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    protected function getRequiredServiceProviders(): array
    {
        return [
            LaravelDataServiceProvider::class,
        ];
    }

    protected function getServiceProviderClass(): string
    {
        return \BombenProdukt\Countries\ServiceProvider::class;
    }
}

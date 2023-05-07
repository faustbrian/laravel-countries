<?php

declare(strict_types=1);

namespace BombenProdukt\Countries\Repository;

use Symfony\Component\Finder\Finder;

abstract readonly class AbstractRepository
{
    protected function getFinder(string $type): Finder
    {
        return (new Finder())
            ->files()
            ->in(__DIR__.'/../../data/'.$type)
            ->name('*.json');
    }
}

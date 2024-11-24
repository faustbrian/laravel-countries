<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Countries\Repository;

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

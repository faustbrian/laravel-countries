<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Countries\Repository;

use BaseCodeOy\Countries\Data\Country;
use Illuminate\Support\Collection;

final readonly class CountryRepository extends AbstractRepository
{
    /**
     * @return Collection<string, Country>
     */
    public function all(): Collection
    {
        $files = new Collection();

        foreach ($this->getFinder('countries') as $file) {
            $countries = \json_decode($file->getContents(), true, \JSON_THROW_ON_ERROR);

            foreach ($countries as $code => $data) {
                $files->put($code, Country::from($data));
            }
        }

        return $files;
    }

    public function findByCode(string $code): Country
    {
        return self::all()->firstWhere('alpha2', \mb_strtoupper($code));
    }
}

<?php

declare(strict_types=1);

namespace BombenProdukt\Countries\Repository;

use BombenProdukt\Countries\Data\Country;
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

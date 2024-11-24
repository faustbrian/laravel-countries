<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Countries\Repository;

use BaseCodeOy\Countries\Data\Subdivision;
use Illuminate\Support\Collection;

final readonly class SubdivisionRepository extends AbstractRepository
{
    /**
     * @return Collection<string, Collection<string, array<int, Subdivision>>>
     */
    public function all(): Collection
    {
        $files = new Collection();

        foreach ($this->getFinder('subdivisions') as $file) {
            $countryCode = $file->getFilenameWithoutExtension();
            $subdivisions = \json_decode($file->getContents(), true, \JSON_THROW_ON_ERROR);

            $files->put($countryCode, new Collection());

            foreach ($subdivisions as $code => $data) {
                $files->get($countryCode)->put($code, Subdivision::from($data));
            }
        }

        return $files;
    }

    /**
     * @return Collection<string, array<int, Subdivision>>
     */
    public function findByCountryCode(string $countryCode): Collection
    {
        return self::all()->get($countryCode, function () use ($countryCode): void {
            throw new \InvalidArgumentException("Subdivisions for {$countryCode} not found");
        });
    }
}

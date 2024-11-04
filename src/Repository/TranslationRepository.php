<?php

declare(strict_types=1);

namespace BaseCodeOy\Countries\Repository;

use Illuminate\Support\Collection;

final readonly class TranslationRepository extends AbstractRepository
{
    /**
     * @return Collection<string, array<int, string>>
     */
    public function all(): Collection
    {
        $files = new Collection();

        foreach ($this->getFinder('translations') as $file) {
            $files->put(
                \mb_strtoupper(\mb_substr($file->getFilenameWithoutExtension(), 10)),
                \json_decode($file->getContents(), true, \JSON_THROW_ON_ERROR),
            );
        }

        return $files;
    }

    /**
     * @return array<int, string>
     */
    public function findByCountryCode(string $countryCode): array
    {
        return self::all()->get(\mb_strtoupper($countryCode), function () use ($countryCode): void {
            throw new \InvalidArgumentException("Translations for {$countryCode} not found");
        });
    }
}

<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

require_once __DIR__.'/vendor/autoload.php';

function readFiles(string $path)
{
    $data = [];

    foreach (\scandir($path) as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $country = \json_decode(\file_get_contents($path.'/'.$file), true, \JSON_THROW_ON_ERROR);
        $countryCode = \array_key_first($country);

        $data[$countryCode] = $country[$countryCode];
    }

    return $data;
}

function readTranslations(string $path)
{
    $data = [];

    foreach (\scandir($path) as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $data[\mb_strtoupper(\mb_substr($file, 10, -5))] = \json_decode(\file_get_contents($path.'/'.$file), true, \JSON_THROW_ON_ERROR);
    }

    return $data;
}

function mapTranslations(array $languages, string $countryCode): array
{
    $formatted = [];

    foreach ($languages as $languageCode => $language) {
        foreach ($language as $translationCode => $translation) {
            if ($translationCode === $countryCode) {
                $formatted[$languageCode] = ['common' => $translation];
            }
        }
    }

    return $formatted;
}

$countries = readFiles('../data/countries');
$subdivisions = readFiles('../data/subdivisions');
$translations = readTranslations('../data/translations');

$formatted = [];

foreach ($countries as $countryCode => $data) {
    $formatted[$countryCode] = [
        'name' => [
            'common' => $data['iso_short_name'],
            'official' => $data['iso_long_name'],
            'translations' => mapTranslations($translations, $countryCode),
        ],
        // 	"tld": [".at"],
        'cca2' => $data['alpha2'],
        'ccn3' => $data['number'],
        'cca3' => $data['alpha3'],
        'cioc' => $data['ioc'],
        // 	"independent": true,
        // 	"status": "officially-assigned",
        // 	"unMember": true,
        // 	"currencies": {"EUR": {"name": "Euro", "symbol": "\u20ac"}},
        // 	"idd": {
        // 		"root": "+4",
        // 		"suffixes": ["3"]
        // 	},
        // 	"capital": ["Vienna"],
        // 	"altSpellings": ["AT", "Osterreich", "Oesterreich"],
        // 	"region": "Europe",
        // 	"subregion": "Western Europe",
        // 	"languages": {
        // 		"bar": "Austro-Bavarian German"
        // 	},
        'latlng' => [$data['geo']['latitude'], $data['geo']['longitude']],
        // 	"demonyms": {
        // 		"fra": {
        // 			"f": "Autrichienne",
        // 			"m": "Autrichien"
        // 		},
        // 		"spa": {
        // 			"f": "Austriaco",
        // 			"m": "Austriaca"
        // 		}
        // 	},
        // 	"landlocked": true,
        // 	"borders": ["CZE", "DEU", "HUN", "ITA", "LIE", "SVK", "SVN", "CHE"],
        // 	"area": 83871,
        // 	"callingCodes": ["+43"]
        // 	"flag": "\ud83c\udde6\ud83c\uddf9"
        // }
    ];
}

dd($formatted['AT']);

<?php

declare(strict_types=1);

/**
 * The icons are not Simtabi LLC's, and the package has to say so wherever it goes.
 *
 * `LICENSE` covers the package code only and stays the plain MIT text, so GitHub
 * and Packagist keep detecting it as MIT: a third-party notice appended to it made
 * the detector answer NOASSERTION in the sibling packs. The upstream notice lives in
 * `ATTRIBUTION.md` at the root, because `docs/` is export-ignored and never reaches
 * a consumer's vendor directory.
 */
function attribution_root(): string
{
    return dirname(__DIR__, 2);
}

/** Strings ATTRIBUTION.md must carry verbatim: the upstream notice and its licence. */
function attribution_required(): array
{
    return [
        'Copyright 2015 IBM Corp.',
        'Apache License',
        'https://github.com/carbon-design-system/carbon',
    ];
}

it(description: 'ships ATTRIBUTION.md at the package root', closure: function () {
    expect(is_file(attribution_root() . '/ATTRIBUTION.md'))->toBeTrue();
});

it(description: 'never export-ignores ATTRIBUTION.md, so the notice reaches every install', closure: function () {
    $lines = file(attribution_root() . '/.gitattributes', FILE_IGNORE_NEW_LINES) ?: [];
    expect(count($lines))->toBeGreaterThan(0);
    foreach ($lines as $line) {
        if (str_contains($line, 'export-ignore')) {
            $pattern = ltrim(trim(strtok($line, " \t")), '/');
            $this->assertFalse(fnmatch($pattern, 'ATTRIBUTION.md'), "'{$line}' would drop ATTRIBUTION.md from the dist archive");
        }
    }
});

it(description: 'carries the upstream notice and licence verbatim', closure: function () {
    $text = (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md');
    $required = attribution_required();
    expect($required)->not->toBeEmpty();
    foreach ($required as $needle) {
        $this->assertStringContainsString($needle, $text, "ATTRIBUTION.md does not carry: {$needle}");
    }
    $this->assertStringContainsString('claims no authorship', $text, 'ATTRIBUTION.md must say Simtabi LLC did not author the icons');
});

it(description: 'keeps LICENSE to the package code, held by Simtabi LLC', closure: function () {
    $license = (string) file_get_contents(attribution_root() . '/LICENSE');
    expect(preg_match_all('/^Copyright /m', $license))->toBe(1);
    $this->assertStringContainsString('Copyright (c) Simtabi LLC', $license);
    $this->assertStringNotContainsString('NOTICE', $license, 'third-party notices belong in ATTRIBUTION.md; appended to LICENSE they break licence detection');
});

it(description: 'points the README licence section at ATTRIBUTION.md', closure: function () {
    $readme = (string) file_get_contents(attribution_root() . '/README.md');
    expect(preg_match('/^## License\n(.*?)(?=^## |\z)/ms', $readme, $m))->toBe(1);
    $this->assertStringContainsString('(ATTRIBUTION.md)', $m[1]);
    $this->assertStringContainsString('claims no authorship', $m[1]);
});

it(description: 'ships the upstream licence text, unchanged since it was verified', closure: function () {
    // The licence-change guard, held locally: config.json records the SHA-256 of
    // the upstream LICENSE as it read at the pinned version. A refresh that
    // brings a different licence text fails here until a person re-reads it.
    $config = json_decode((string) file_get_contents(attribution_root() . '/resources/assets/svg/config.json'), true, flags: JSON_THROW_ON_ERROR);
    $path = attribution_root() . '/resources/assets/svg/licenses/carbon/LICENSE';

    expect(is_file($path))->toBeTrue()
        ->and($config['license']['spdx'])->toBe('Apache-2.0')
        ->and(hash_file('sha256', $path))->toBe($config['license']['sha256']);

    $this->assertStringContainsString('resources/assets/svg/licenses/carbon/LICENSE', (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md'));
});

it(description: 'ships the NOTICE file outside the licence directory the sync replaces', closure: function () {
    expect(is_file(attribution_root() . '/resources/assets/svg/NOTICE'))->toBeTrue();
    $this->assertStringContainsString('resources/assets/svg/NOTICE', (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md'));

    $config = json_decode((string) file_get_contents(attribution_root() . '/resources/assets/svg/config.json'), true, flags: JSON_THROW_ON_ERROR);
    expect($config['license']['notice'])->toBe('resources/assets/svg/NOTICE');
});

it(description: 'keeps only upstream licence files in licenses/carbon/', closure: function () {
    // icon-sets-sync's licence sink deletes this directory and writes upstream's
    // licence files back on every real sync, so a file the pack wrote here
    // itself would be lost. Upstream ships LICENSE and nothing else (a dry run
    // of the recipe reports would_write=[LICENSE]).
    $files = array_values(array_diff(scandir(attribution_root() . '/resources/assets/svg/licenses/carbon') ?: [], ['.', '..']));

    expect($files)->toBe(['LICENSE']);
});

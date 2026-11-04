<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\IconSetsCarbon\Enums\Variant;
use Simtabi\Laranail\Ichava\IconSetsCarbon\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsCarbon\Providers\IconsServiceProvider;

it(description: 'boots the provider without error', closure: function () {
    $providers = array_keys($this->app->getLoadedProviders());

    expect($providers)->toContain(IconsServiceProvider::class);
});

it(description: 'resolves constants from config json', closure: function () {
    expect(IconsConstants::getVendorPackage())->toBe('ichava/icon-sets-carbon')
        ->and(IconsConstants::getTitle())->toBe('Carbon Icons')
        ->and(IconsConstants::getPrefix())->toBe('carbon')
        ->and(IconsConstants::getDefaultVariant())->toBe('size-32');
});

it(description: 'uses the config prefix in enum class helpers', closure: function () {
    expect(Variant::SIZE_32->getClass())->toBe('carbon-size-32')
        ->and(Variant::SIZE_16->getClass())->toBe('carbon-size-16');
});

it(description: 'matches the default variant to config json', closure: function () {
    expect(Variant::default())->toBe(Variant::SIZE_32)
        ->and(Variant::SIZE_32->isDefault())->toBeTrue()
        ->and(Variant::SIZE_16->isDefault())->toBeFalse();
});

it(description: 'picks up the package in the icon registry', closure: function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->isRegistered('ichava/icon-sets-carbon'))->toBeTrue(
        'IconRegistry should have ichava/icon-sets-carbon registered after boot.',
    );
});

it(description: 'ships one directory per variant, holding the measured number of icons', closure: function () {
    // Counted 2026-11-04 from the vendored tree. The subset is deliberate (see
    // docs/architecture.md); a refresh that changes a count changes this table
    // in the same pull request, so a silently shrunk or grown variant fails.
    $expected = [
        'size-32' => 2773,
        'size-16' => 68,
    ];

    $files = dirname(__DIR__, 2) . '/resources/assets/svg/files';
    $actual = [];

    foreach (glob($files . '/*', GLOB_ONLYDIR) ?: [] as $dir) {
        $actual[basename($dir)] = count(glob($dir . '/*.svg') ?: []);
    }

    ksort($expected);
    ksort($actual);

    expect($actual)->toBe($expected)
        ->and(array_keys($actual))->toEqualCanonicalizing(Variant::values());
});

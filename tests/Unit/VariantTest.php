<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\IconSetsCarbon\Enums\Variant;

/**
 * Pure-enum behaviour tests. Anything that touches config.json (default(),
 * isDefault(), getClass(), getPath()) lives in the Feature suite where the
 * Laravel container is bootstrapped.
 */
it(description: 'exposes the size-32 case value', closure: function () {
    expect(Variant::SIZE_32->getValue())->toBe('size-32');
});

it(description: 'exposes the size-16 case value', closure: function () {
    expect(Variant::SIZE_16->getValue())->toBe('size-16');
});

it(description: 'returns every case from values', closure: function () {
    expect(Variant::values())->toBe(['size-32', 'size-16']);
});

it(description: 'resolves known values and rejects unknown ones', closure: function () {
    expect(Variant::tryFromValue('size-32'))->toBe(Variant::SIZE_32)
        ->and(Variant::tryFromValue('size-16'))->toBe(Variant::SIZE_16)
        ->and(Variant::tryFromValue('not-a-real-variant'))->toBeNull();
});

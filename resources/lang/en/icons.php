<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Carbon Icons -- localisable strings
|--------------------------------------------------------------------------
|
| An overlay, not a second source of truth. `name` and `description` are
| deliberately absent: IconRegistry::fromDirectory() reads those from
| resources/assets/svg/config.json, which is canonical. A copy here would
| drift from it, and nothing would notice, because nothing loads this file
| for those keys. A non-English locale may add them to override; `en` must
| not.
|
| Variant keys match Simtabi\Laranail\Ichava\IconSetsCarbon\Enums\Variant.
|
*/

return [
    'variants' => [
        'size-32' => '32 px',
        'size-16' => '16 px',
    ],

    'variant_descriptions' => [
        'size-32' => 'The full set, drawn on the 32 px grid',
        'size-16' => 'Glyphs redrawn for 16 px, where upstream ships one',
    ],
];

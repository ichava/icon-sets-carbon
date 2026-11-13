<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsCarbon\Enums;

use Simtabi\Laranail\Ichava\Traits\HasIconSetVariants;
use Simtabi\Laranail\Ichava\Contracts\IconSetVariantInterface;
use Simtabi\Laranail\Ichava\IconSetsCarbon\Constants\IconsConstants;

/**
 * Type-safe variant selection for Carbon Icons (size-32 / size-16).
 */
enum Variant: string implements IconSetVariantInterface
{
    use HasIconSetVariants;

    case SIZE_32 = 'size-32';
    case SIZE_16 = 'size-16';

    public function getPath(): string
    {
        return IconsConstants::getSvgPath($this->value);
    }

    private static function getDefaultValue(): string
    {
        return IconsConstants::getDefaultVariant() ?? self::SIZE_32->value;
    }

    private static function getClassPrefix(): string
    {
        return IconsConstants::getPrefix();
    }
}

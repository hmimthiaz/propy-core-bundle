<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum MediaType: string implements EnumInterface
{
    case ASSET = 'asset';

    case PROFILE = 'profile';

    public static function getStatuses(): array
    {
        return [
            self::ASSET->value,
            self::PROFILE->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::ASSET->value => 'Asset',
            self::PROFILE->value => 'Profile',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

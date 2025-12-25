<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum AuthLoginMethod: string implements EnumInterface
{
    case PASSWORD = 'password';
    case SOCIAL_GOOGLE = 'social_google';
    case SOCIAL_MICROSOFT = 'social_microsoft';

    public static function getStatuses(): array
    {
        return [
            self::PASSWORD->value,
            self::SOCIAL_GOOGLE->value,
            self::SOCIAL_MICROSOFT->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::PASSWORD->value => 'Password Authentication',
            self::SOCIAL_GOOGLE->value => 'Google Social Login',
            self::SOCIAL_MICROSOFT->value => 'Microsoft Social Login',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum NotifierPriority: string implements EnumInterface
{
    case PRIORITY_LOW = 'low';
    case PRIORITY_DEFAULT = 'medium';
    case PRIORITY_HIGH = 'high';

    public static function getStatuses(): array
    {
        return [
            self::PRIORITY_LOW->value,
            self::PRIORITY_DEFAULT->value,
            self::PRIORITY_HIGH->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::PRIORITY_LOW->value => 'Low',
            self::PRIORITY_DEFAULT->value => 'Default',
            self::PRIORITY_HIGH->value => 'High',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

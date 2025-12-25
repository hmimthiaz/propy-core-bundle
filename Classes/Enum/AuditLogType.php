<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum AuditLogType: string implements EnumInterface
{
    case ERROR = 'error';

    case INFO = 'info';

    case WARNING = 'warning';

    public static function getStatuses(): array
    {
        return [
            self::ERROR->value,
            self::INFO->value,
            self::WARNING->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::ERROR->value => 'Error',
            self::INFO->value => 'Info',
            self::WARNING->value => 'Warning',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

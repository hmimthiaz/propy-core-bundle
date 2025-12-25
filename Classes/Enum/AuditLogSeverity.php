<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum AuditLogSeverity: string implements EnumInterface
{
    case LOW = 'low';

    case NORMAL = 'normal';

    case HIGH = 'high';

    case CRITICAL = 'critical';

    public static function getStatuses(): array
    {
        return [
            self::LOW->value,
            self::NORMAL->value,
            self::HIGH->value,
            self::CRITICAL->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::LOW->value => 'Low',
            self::NORMAL->value => 'Normal',
            self::HIGH->value => 'High',
            self::CRITICAL->value => 'Critical',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

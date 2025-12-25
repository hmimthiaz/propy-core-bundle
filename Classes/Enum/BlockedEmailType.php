<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum BlockedEmailType: string implements EnumInterface
{
    case BOUNCE = 'bounce';

    case COMPLAINT = 'complaint';

    case MANUAL = 'manual';

    public static function getStatuses(): array
    {
        return [
            self::BOUNCE->value,
            self::COMPLAINT->value,
            self::MANUAL->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::BOUNCE->value => 'Bounce',
            self::COMPLAINT->value => 'Complaint',
            self::MANUAL->value => 'Manual',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

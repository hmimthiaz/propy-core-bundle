<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum NotificationStatus: string implements EnumInterface
{
    case QUEUED = 'queued';

    case DISPATCHED = 'dispatched';

    case DELIVERED = 'delivered';

    case ERROR = 'error';

    case FAILED = 'failed';

    case COMPLAINT = 'complaint';

    case BOUNCE = 'bounce';

    case SENT = 'sent';

    case BLOCKED = 'blocked';

    case INVALID = 'invalid';

    case UNDELIVERED = 'undelivered';

    public static function getStatuses(): array
    {
        return [
            self::QUEUED->value,
            self::DISPATCHED->value,
            self::DELIVERED->value,
            self::ERROR->value,
            self::FAILED->value,
            self::COMPLAINT->value,
            self::BOUNCE->value,
            self::SENT->value,
            self::BLOCKED->value,
            self::INVALID->value,
            self::UNDELIVERED->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::QUEUED->value => 'Queued',
            self::DISPATCHED->value => 'Dispatched',
            self::DELIVERED->value => 'Delivered',
            self::ERROR->value => 'Error',
            self::FAILED->value => 'Failed',
            self::COMPLAINT->value => 'Complaint',
            self::BOUNCE->value => 'Bounce',
            self::SENT->value => 'Sent',
            self::BLOCKED->value => 'Blocked',
            self::INVALID->value => 'Invalid',
            self::UNDELIVERED->value => 'Undelivered',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

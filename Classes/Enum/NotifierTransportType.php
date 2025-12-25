<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum NotifierTransportType: string implements EnumInterface
{
    case EMAIL = 'email';

    case SMS = 'sms';

    case WHATSAPP = 'whatsapp';

    case PUSH = 'push';

    case SLACK = 'slack';

    public static function getStatuses(): array
    {
        return [
            self::EMAIL->value,
            self::SMS->value,
            self::WHATSAPP->value,
            self::PUSH->value,
            self::SLACK->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::EMAIL->value => 'Email',
            self::SMS->value => 'SMS',
            self::WHATSAPP->value => 'WhatsApp',
            self::PUSH->value => 'Push Notification',
            self::SLACK->value => 'Slack',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

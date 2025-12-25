<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum SettingScopeType: string implements EnumInterface
{
    case Propy = 'propy';
    case User = 'User';
    case Collection = 'collection';

    public static function getStatuses(): array
    {
        return [
            self::Propy->value,
            self::User->value,
            self::Collection->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::Propy->value => 'Propy',
            self::User->value => 'User',
            self::Collection->value => 'Collection',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

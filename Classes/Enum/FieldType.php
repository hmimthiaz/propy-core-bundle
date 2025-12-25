<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum FieldType: string implements EnumInterface
{
    case TEXT = 'text';

    case PASSWORD = 'password';

    case EMAIL = 'email';

    case URL = 'url';

    case TEXT_AREA = 'text-area';

    case RICH_TEXT = 'rich-text';

    case DATE = 'date';

    case TIME = 'time';

    case DATE_TIME = 'date-time';

    case COLOR = 'color';

    case OPTION = 'option';

    public static function getStatuses(): array
    {
        return [
            self::TEXT->value,
            self::PASSWORD->value,
            self::EMAIL->value,
            self::URL->value,
            self::TEXT_AREA->value,
            self::RICH_TEXT->value,
            self::DATE->value,
            self::TIME->value,
            self::DATE_TIME->value,
            self::COLOR->value,
            self::OPTION->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::TEXT->value => 'Text',
            self::PASSWORD->value => 'Password',
            self::EMAIL->value => 'Email',
            self::URL->value => 'URL',
            self::TEXT_AREA->value => 'Text Area',
            self::RICH_TEXT->value => 'Rich Text',
            self::DATE->value => 'Date',
            self::TIME->value => 'Time',
            self::DATE_TIME->value => 'Date Time',
            self::COLOR->value => 'Color',
            self::OPTION->value => 'Option',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

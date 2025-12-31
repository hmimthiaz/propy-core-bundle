<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum MediaExtensionGroup: string implements EnumInterface
{
    case IMAGE = 'image';

    case IMAGE_ALL = 'image-all';

    case ICON = 'icon';

    case VIDEO = 'video';

    case DOCUMENT = 'document';

    case AUDIO = 'audio';

    case ARCHIVE = 'archive';

    case ALL = 'all';

    public static function getStatuses(): array
    {
        return [
            self::IMAGE->value,
            self::IMAGE_ALL->value,
            self::ICON->value,
            self::VIDEO->value,
            self::DOCUMENT->value,
            self::AUDIO->value,
            self::ARCHIVE->value,
            self::ALL->value,
        ];
    }

    public static function getStatusMimes(string $type): array
    {
        return match ($type) {
            self::IMAGE->value => ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'],
            self::IMAGE_ALL->value => ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'],
            self::ICON->value => ['image/svg+xml'],
            self::VIDEO->value => ['video/mp4', 'video/webm', 'video/quicktime', 'video/x-ms-wmv', 'video/quicktime', 'video/avi'],
            self::DOCUMENT->value => ['application/pdf'],
            self::AUDIO->value => ['audio/mpeg'],
            self::ARCHIVE->value => ['application/zip'],
            self::ALL->value => self::allowedMimeTypes(),
            default => [],
        };
    }

    public static function getGroupAllowedFileSize(string $type): int
    {
        return match ($type) {
            self::IMAGE_ALL->value, self::IMAGE->value, self::ICON->value => 3,
            default => 50,
        };
    }

    public static function allowedMimeTypes(): array
    {
        return [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/webp',
            'image/gif',
            'image/svg+xml',
            'video/mp4',
            'video/webm',
            'video/x-ms-wmv',
            'video/quicktime',
            'video/avi',
            'application/pdf',
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::IMAGE->value => 'Image',
            self::ICON->value => 'Icon',
            self::VIDEO->value => 'Video',
            self::DOCUMENT->value => 'Document',
            self::AUDIO->value => 'Audio',
            self::ARCHIVE->value => 'Archive',
            self::ALL->value => 'All',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

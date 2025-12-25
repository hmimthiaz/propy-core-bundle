<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum ApiKeyScope: string implements EnumInterface
{
    case JWT_AUTH = 'jwt_auth';      // Can request JWT tokens (user authentication)
    case API_ACCESS = 'api_access';   // Can make direct API calls
    case BOTH = 'both';               // Can do both

    public static function getStatuses(): array
    {
        return [
            self::JWT_AUTH->value,
            self::API_ACCESS->value,
            self::BOTH->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::JWT_AUTH->value => 'JWT Authentication Only',
            self::API_ACCESS->value => 'API Access Only',
            self::BOTH->value => 'JWT Authentication & API Access',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }

    public function canAuthenticateUsers(): bool
    {
        return in_array($this, [self::JWT_AUTH, self::BOTH]);
    }

    public function canAccessApi(): bool
    {
        return in_array($this, [self::API_ACCESS, self::BOTH]);
    }
}

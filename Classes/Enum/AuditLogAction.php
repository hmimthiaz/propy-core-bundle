<?php

namespace Propy\CoreBundle\Classes\Enum;

use Propy\CoreBundle\Classes\Interface\EnumInterface;

enum AuditLogAction: string implements EnumInterface
{
    case ADD = 'add';

    case UPDATE = 'update';

    case DELETE = 'delete';
    case RESET = 'reset';

    case VIEW = 'view';

    case EXPORT = 'export';

    case IMPORT = 'import';

    case TOKEN_CREATE = 'token_create';

    case LOGIN = 'login';

    case LOGIN_FAILED = 'login_failed';

    case PROFILE_UPDATE = 'profile_update';

    case PASSWORD_UPDATE = 'password_update';

    case PASSWORD_RESET = 'password_reset';

    case LOGOUT = 'logout';

    case NOTIFY = 'notify';

    case APPROVE = 'approve';

    case REJECT = 'reject';

    case PUBLISH = 'publish';

    case UNPUBLISH = 'unpublish';

    case SCHEDULE = 'schedule';

    case UNSCHEDULE = 'unschedule';

    case RESCHEDULE = 'reschedule';

    case ASSIGN = 'assign';

    case UNASSIGN = 'unassign';

    case COMPLETE = 'complete';

    case CANCEL = 'cancel';

    case ENABLE = 'enable';

    case DISABLE = 'disable';

    case DEFAULT = 'default';

    public static function getStatuses(): array
    {
        return [
            self::ADD->value,
            self::UPDATE->value,
            self::DELETE->value,
            self::RESET->value,
            self::VIEW->value,
            self::EXPORT->value,
            self::IMPORT->value,
            self::TOKEN_CREATE->value,
            self::LOGIN->value,
            self::LOGIN_FAILED->value,
            self::PROFILE_UPDATE->value,
            self::PASSWORD_UPDATE->value,
            self::PASSWORD_RESET->value,
            self::LOGOUT->value,
            self::NOTIFY->value,
            self::APPROVE->value,
            self::REJECT->value,
            self::PUBLISH->value,
            self::UNPUBLISH->value,
            self::SCHEDULE->value,
            self::UNSCHEDULE->value,
            self::RESCHEDULE->value,
            self::ASSIGN->value,
            self::UNASSIGN->value,
            self::COMPLETE->value,
            self::CANCEL->value,
            self::ENABLE->value,
            self::DISABLE->value,
            self::DEFAULT->value,
        ];
    }

    public static function getCaption(string $type): string
    {
        $captions = [
            self::ADD->value => 'Add',
            self::UPDATE->value => 'Update',
            self::DELETE->value => 'Delete',
            self::RESET->value => 'Reset',
            self::VIEW->value => 'View',
            self::EXPORT->value => 'Export',
            self::IMPORT->value => 'Import',
            self::TOKEN_CREATE->value => 'Token Create',
            self::LOGIN->value => 'Login',
            self::LOGIN_FAILED->value => 'Login Failed',
            self::PROFILE_UPDATE->value => 'Profile Update',
            self::PASSWORD_UPDATE->value => 'Password Update',
            self::PASSWORD_RESET->value => 'Password Reset',
            self::LOGOUT->value => 'Logout',
            self::NOTIFY->value => 'Notify',
            self::APPROVE->value => 'Approve',
            self::REJECT->value => 'Reject',
            self::PUBLISH->value => 'Publish',
            self::UNPUBLISH->value => 'Unpublish',
            self::SCHEDULE->value => 'Schedule',
            self::UNSCHEDULE->value => 'Unschedule',
            self::RESCHEDULE->value => 'Reschedule',
            self::ASSIGN->value => 'Assign',
            self::UNASSIGN->value => 'Unassign',
            self::COMPLETE->value => 'Complete',
            self::CANCEL->value => 'Cancel',
            self::ENABLE->value => 'Enable',
            self::DISABLE->value => 'Disable',
            self::DEFAULT->value => 'Default',
        ];

        return $captions[$type] ?? 'Unknown';
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::getStatuses());
    }
}

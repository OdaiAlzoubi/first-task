<?php

namespace App\Constants\User;

class UserRoleConstants
{
    const ADMIN = 0;
    const STUDENT = 1;

    public const ROLES = [
        self::ADMIN => 'Admin',
        self::STUDENT => 'Student'
    ];
}

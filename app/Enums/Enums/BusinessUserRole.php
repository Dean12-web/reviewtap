<?php

namespace App\Enums\Enums;

enum BusinessUserRole: string
{
    case OWNER = 'OWNER';
    case ADMIN = 'ADMIN';
    case STAFF = 'STAFF';
}

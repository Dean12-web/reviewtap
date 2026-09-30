<?php

namespace App\Enums\Enums;

enum BusinessStatus: string
{
    case ACTIVE = 'active';
    case SUSPENDED = 'suspended';
    case INACTIVE = 'inactive';
}

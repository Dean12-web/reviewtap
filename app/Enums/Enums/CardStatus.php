<?php

namespace App\Enums\Enums;

enum CardStatus: string
{
    case UNACTIVATED = 'UNACTIVATED';
    case ACTIVE = 'ACTIVE';
    case SUSPENDED = 'SUSPENDED';
    case DISABLED = 'DISABLED';
}

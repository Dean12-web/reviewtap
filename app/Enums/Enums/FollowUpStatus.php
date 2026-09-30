<?php

namespace App\Enums\Enums;

enum FollowUpStatus: string
{
    case OPEN = 'OPEN';
    case IN_PROGRESS = 'IN_PROGRESS';
    case RESOLVED = 'RESOLVED';
    case CANCELLED = 'CANCELLED';
}

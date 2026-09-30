<?php

namespace App\Enums\Enums;

enum SubscriptionStatus: string
{
    case TRIAL = 'TRIAL';
    case ACTIVE = 'ACTIVE';
    case PAST_DUE = 'PAST_DUE';
    case CANCELLED = 'CANCELLED';
    case EXPIRED = 'EXPIRED';
}

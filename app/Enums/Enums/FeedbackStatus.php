<?php

namespace App\Enums\Enums;

enum FeedbackStatus: string
{
    case NEW = 'NEW';
    case IN_PROGRESSS = 'IN_PROGRESSS';
    case RESOLVED = 'RESOLVED';
    case IGNORED = 'IGNORED';
}

<?php

namespace App\Enums\Enums;

enum CardAccessEvent: string
{
    case SCAN = 'SCAN';
    case ACTIVATION_VIEW = 'ACTIVATION_VIEW';
    case REDIRECT = 'REDIRECT';
    case MANAGE_VIEW = 'MANAGE_VIEW';
    case PIN_SUCCESS = 'PIN_SUCCESS';
    case PIN_FAILED = 'PIN_FAILED';
}

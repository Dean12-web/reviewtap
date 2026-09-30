<?php

namespace App\Enums;

enum ProductMode: string
{
    case ONE_TIME = 'ONE_TIME';
    case SUBSCRIPTION = 'SUBSCRIPTION';
}

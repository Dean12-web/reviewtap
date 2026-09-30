<?php

namespace App\Enums\Enums;

enum SitemapChangefreq: string
{
    case ALWAYS = 'always';
    case HOURLY = 'hoirly';
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';
    case NEVER = 'never';
}

<?php

namespace App\Enums\Enums;

enum OrderPaymentStatus: string
{
    case UNPAID = 'unpaid';
    case PAID = 'paid';
    case REFUNDED = 'refunded';
}

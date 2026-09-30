<?php

namespace App\Enums\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case PREPARING = 'preparing';
    case SERVED = 'served';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}

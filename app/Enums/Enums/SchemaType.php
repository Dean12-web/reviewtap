<?php

namespace App\Enums\Enums;

enum SchemaType: string
{
    case NONE = 'NONE';
    case PRODUCT = 'PRODUCT';
    case FAQ = 'FAQ';
    case ORGANIZATION = 'ORGANIZATION';
    case SOFTWARE_APP = 'SOFTWARE_APP';
    case CUSTOM = 'CUSTOM';
}

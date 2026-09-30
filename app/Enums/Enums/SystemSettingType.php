<?php

namespace App\Enums\Enums;

enum SystemSettingType: string
{
    case STRING = 'string';
    case TEXT = 'text';
    case JSON = 'json';
    case BOOLEAN = 'boolean';
    case INTEGER = 'integer';
    case FILE = 'file';
}

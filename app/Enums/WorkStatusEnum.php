<?php

namespace App\Enums;

enum WorkStatusEnum: string
{
    case ACTIVE = 'Active';
    case ON_LEAVE = 'On Leave';
    case NOT_ACTIVE = 'Not Active';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

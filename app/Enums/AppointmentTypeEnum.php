<?php

namespace App\Enums;

enum AppointmentTypeEnum: string
{
    case CONFIRMED = 'confirmed';
    case SABBATICAL = 'sabbatical';
    case PROBATION = 'probation';
    case TEMPORARY = 'temporary';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

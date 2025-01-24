<?php

namespace App\Enums;

enum TerminationTypeEnum: string
{
    case PENSION = 'pension';
    case CONTRACT = 'contract';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

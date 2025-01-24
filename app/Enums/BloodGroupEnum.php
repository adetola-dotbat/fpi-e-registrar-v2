<?php

namespace App\Enums;

enum BloodGroupEnum: string
{
    case A_POSITIVE = 'A+';
    case A_NEGATIVE = 'A-';
    case B_POSITIVE = 'B+';
    case B_NEGATIVE = 'B-';
    case O_POSITIVE = 'O+';
    case O_NEGATIVE = 'O-';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

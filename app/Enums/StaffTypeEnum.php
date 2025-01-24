<?php

namespace App\Enums;

enum StaffTypeEnum: string
{
    case ACADEMIC = 'Academic';
    case NON_TEACHING = 'Non Teaching';
    case JUNIOR = 'Junior';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

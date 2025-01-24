<?php

namespace App\Enums;

enum ApproveStatusEnum: string
{
    case APPROVED = 'approved';
    case PENDING = 'pending';
    case DECLINE = 'decline';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

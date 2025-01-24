<?php

namespace App\Enums;

enum GenotypeEnum: string
{
    case AA = 'AA';
    case AS = 'AS';
    case SS = 'SS';
    case AC = 'AC';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

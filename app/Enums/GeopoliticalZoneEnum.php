<?php

namespace App\Enums;

enum GeopoliticalZoneEnum: string
{
    case NORTH_CENTRAL = 'North Central/Middle Belt';
    case NORTH_EAST = 'North East';
    case NORTH_WEST = 'North West';
    case SOUTH_EAST = 'South East';
    case SOUTH_SOUTH = 'South South';
    case SOUTH_WEST = 'South West';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

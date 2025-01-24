<?php

namespace App\Enums;

enum RelationshipEnum: int
{
    case FATHER = 1;
    case MOTHER = 2;
    case UNCLE = 3;
    case AUNTY = 4;
    case BROTHER = 5;
    case SISTER = 6;
    case COUSIN = 7;
    case NEPHEW = 8;
    case WIFE = 9;
    case HUSBAND = 10;
    case DAUGHTER = 11;
    case SON = 12;

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

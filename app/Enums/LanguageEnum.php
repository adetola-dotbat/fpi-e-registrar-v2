<?php

namespace App\Enums;

enum LanguageEnum: string
{
    case ARABIC = 'Arabic';
    case ENGLISH = 'English';
    case FRENCH = 'French';
    case ITALIAN = 'Italian';
    case SPANISH = 'Spanish';
    case YORUBA = 'Yoruba';
    case IGBO = 'Igbo';
    case HAUSA = 'Hausa';
    case KOREAN = 'Korean';
    case PORTUGUESE = 'Portuguese';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}

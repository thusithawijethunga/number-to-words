<?php

namespace NumberToWords\Language\Sinhala;

use NumberToWords\Language\ExponentGetter;

class SinhalaExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'දහස්',
        'මිලියන',
        'බිලියන',
        'ට්‍රිලියන',
        'quadrillion',
        'ක්වින්ටිලියන',
        'sextillion',
        'septillion',
        'octillion',
        'නොමිලියන',
        'දශය',
        'දක්ෂ',
        'duodecillion',
        'tredecillion',
        'quattuordecillion',
        'quindecillion',
        'sex decillion',
        'septendecillion',
        'octodecillion',
        'novemdecillion',
        'vigintilion',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}

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
        'quintillion',
        'sextillion',
        'septillion',
        'octillion',
        'nonillion',
        'decillion',
        'undecillion',
        'duodecillion',
        'tredecillion',
        'quattuordecillion',
        'quindecillion',
        'sexdecillion',
        'septendecillion',
        'octodecillion',
        'novemdecillion',
        'vigintillion',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}

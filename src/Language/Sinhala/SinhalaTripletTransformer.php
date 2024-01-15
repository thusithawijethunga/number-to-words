<?php

namespace NumberToWords\Language\Sinhala;

use NumberToWords\Language\TripletTransformer;

class SinhalaTripletTransformer implements TripletTransformer
{
    private SinhalaDictionary $dictionary;

    public function __construct(SinhalaDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function transformToWords(int $number): string
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->dictionary->getCorrespondingHundred($hundreds);
        }

        if ($tens !== 0 || $units !== 0) {
            $words[] = $this->getSubHundred($tens, $units);
        }

        return implode(' ', $words);
    }

    private function getSubHundred($tens, $units): string
    {
        $words = [];

        if ($tens === 1) {
            $words[] = $this->dictionary->getCorrespondingTeen($units);
        } else {
            if ($tens > 0) {
                $words[] = $this->dictionary->getCorrespondingTen($tens,$units);
            }
            if ($units > 0) {
                $words[] = $this->dictionary->getCorrespondingUnit($units);
            }
        }

        return implode(' ', $words);
    }
}

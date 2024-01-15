<?php

namespace NumberToWords\Service;

class NumberToTripletsConverter
{
    public function convertToTriplets(float $number): array
    {
        $triplets = [];

        while ($number > 0) {
            $triplets[] =(int) $number % 1000;
            $number = (int) ($number / 1000);
        }

        return array_reverse($triplets);
    }
}

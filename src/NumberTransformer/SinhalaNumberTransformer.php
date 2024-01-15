<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Sinhala\SinhalaDictionary;
use NumberToWords\Language\Sinhala\SinhalaNounGenderInflector;
use NumberToWords\Language\Sinhala\SinhalaExponentInflector;
use NumberToWords\Language\Sinhala\SinhalaTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class SinhalaNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new SinhalaDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new SinhalaTripletTransformer($dictionary);
        $exponentInflector = new SinhalaExponentInflector(new SinhalaNounGenderInflector());

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
    
}

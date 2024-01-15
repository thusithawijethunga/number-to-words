<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Sinhala\SinhalaDictionary;
use NumberToWords\Language\Sinhala\SinhalaExponentGetter;
use NumberToWords\Language\Sinhala\SinhalaTripletTransformer;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;
use NumberToWords\Service\NumberToTripletsConverter;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class SinhalaCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $dictionary = new SinhalaDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new SinhalaTripletTransformer($dictionary);
        $exponentInflector = new SinhalaExponentGetter();

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->useRegularExponents($exponentInflector)
            ->build();

        $decimal = (int) ($amount / 100);
        $fraction = abs($amount % 100);

        if ($fraction === 0) {
            $fraction = null;
        }

        $currency = strtoupper($currency);

        if (!array_key_exists($currency, SinhalaDictionary::$currencyNames)) {
            throw new NumberToWordsException(sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this)));
        }

        $currencyNames = SinhalaDictionary::$currencyNames[$currency];

        $return = trim($numberTransformer->toWords($decimal));
        $level = $decimal === 1 ? 0 : 1;

        if ($level > 0) {
            if (count($currencyNames[0]) > 1) {
                $return .= ' ' . $currencyNames[0][$level];
            } else {
                $return .= ' ' . $currencyNames[0][0] . 's';
            }
        } else {
            $return .= ' ' . $currencyNames[0][0];
        }

        if (null !== $fraction) {
            $return .= ' ' . trim($numberTransformer->toWords($fraction));

            $level = $fraction === 1 ? 0 : 1;

            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= ' ' . $currencyNames[1][$level];
                } else {
                    $return .= ' ' . $currencyNames[1][0] . 's';
                }
            } else {
                $return .= ' ' . $currencyNames[1][0];
            }
        }

        return $return;
    }

    public function toWordsDecimal(float $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $dictionary = new SinhalaDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new SinhalaTripletTransformer($dictionary);
        $exponentInflector = new SinhalaExponentGetter();

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->useRegularExponents($exponentInflector)
            ->build();

        $decimal = (int) $amount;

        // Extract the decimal part
        $decimalPart = fmod($amount, 1);

        // Convert to a string and remove the leading "0."
        $fraction = substr(strval($decimalPart), 2);

        if ($fraction === 0) {
            $fraction = null;
        }

        $currency = strtoupper($currency);

        if (!array_key_exists($currency, SinhalaDictionary::$currencyNames)) {
            throw new NumberToWordsException(sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this)));
        }

        $currencyNames = SinhalaDictionary::$currencyNames[$currency];

        $level = $decimal === 1 ? 0 : 1;
        $return = '';

        if ($decimal != 0) {
            if ($level > 0) {
                if (count($currencyNames[0]) > 1) {
                    $return .= $currencyNames[0][$level];
                } else {
                    $return .= $currencyNames[0][0] . 's';
                }
            } else {
                $return .= $currencyNames[0][0];
            }
            $return .= ' ' . trim($numberTransformer->toWords($decimal)) . 'යි';
        }

        if (null !== $fraction) {
            $level = $fraction === 1 ? 0 : 1;

            if ($decimal != 0) {
                $return .= ' ';
            }

            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= '' . $currencyNames[1][$level];
                } else {
                    $return .= '' . $currencyNames[1][0] . 'කි';
                }
            } else {
                $return .= '' . $currencyNames[1][0];
            }

            $return .= ' ' . trim($numberTransformer->toWords($fraction)) . 'යි';
        }

        return $return;
    }
}

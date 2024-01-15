<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

interface CurrencyTransformer
{
    /**
     * @throws NumberToWordsException
     */
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string;

    public function toWordsDecimal(float $amount, string $currency, ?CurrencyTransformerOptions $options = null): string;
}

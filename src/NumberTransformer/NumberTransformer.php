<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Exception\NumberToWordsException;

interface NumberTransformer
{
    /**
     * @throws NumberToWordsException
     */
    public function toWords(float $number): string;

    /**
     * @throws NumberToWordsException
     */
    // public function toWordsDecimal(float $number): string;
}

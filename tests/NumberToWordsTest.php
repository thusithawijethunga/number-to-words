<?php

namespace NumberToWords;

use NumberToWords\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class NumberToWordsTest extends TestCase
{
    public function testItThrowsExceptionIfNumberTransformerDoesNotExist(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getNumberTransformer('xx');
    }

    public function testItThrowsExceptionIfCurrencyTransformerDoesNotExist(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getCurrencyTransformer('xx');
    }

    public function testItNumberTransformerAndCurrencyTransformerWithStaticMethods(): void
    {
        $numberToWords = NumberToWords::transformNumber('en', 5120);
        $currencyToWords = NumberToWords::transformCurrency('en', 5099, 'USD');

        $this->assertEquals($numberToWords, 'five thousand one hundred twenty');
        $this->assertEquals($currencyToWords, 'fifty dollars ninety-nine cents');
    }

    public function testItNumberTransformerAndCurrencyTransformerWithStaticMethodsSinhala(): void
    {
        $numberToWords = NumberToWords::transformNumber('en', 85450);

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getCurrencyTransformer('si');

        $inWord = $numberTransformer->toWordsDecimal(0.0, 'LKR');
        $this->assertEquals($inWord, '');

        //ශත x 1
        $inWord = $numberTransformer->toWordsDecimal(0.01, 'LKR');
        $this->assertEquals($inWord, 'ශත එකයි');
        $inWord = $numberTransformer->toWordsDecimal(0.02, 'LKR');
        $this->assertEquals($inWord, 'ශත දෙකයි');
        $inWord = $numberTransformer->toWordsDecimal(0.03, 'LKR');
        $this->assertEquals($inWord, 'ශත තුනයි');
        $inWord = $numberTransformer->toWordsDecimal(0.04, 'LKR');
        $this->assertEquals($inWord, 'ශත හතරයි');
        $inWord = $numberTransformer->toWordsDecimal(0.05, 'LKR');
        $this->assertEquals($inWord, 'ශත පහයි');
        $inWord = $numberTransformer->toWordsDecimal(0.06, 'LKR');
        $this->assertEquals($inWord, 'ශත හයයි');
        $inWord = $numberTransformer->toWordsDecimal(0.07, 'LKR');
        $this->assertEquals($inWord, 'ශත හතයි');
        $inWord = $numberTransformer->toWordsDecimal(0.08, 'LKR');
        $this->assertEquals($inWord, 'ශත අටයි');
        $inWord = $numberTransformer->toWordsDecimal(0.09, 'LKR');
        $this->assertEquals($inWord, 'ශත නවයයි');

        //ශත x 10
        $inWord = $numberTransformer->toWordsDecimal(0.1, 'LKR');
        $this->assertEquals($inWord, 'ශත දහයයි');
        $inWord = $numberTransformer->toWordsDecimal(0.11, 'LKR');
        $this->assertEquals($inWord, 'ශත එකොළහයි');
        $inWord = $numberTransformer->toWordsDecimal(0.12, 'LKR');
        $this->assertEquals($inWord, 'ශත දොළහයි');
        $inWord = $numberTransformer->toWordsDecimal(0.13, 'LKR');
        $this->assertEquals($inWord, 'ශත දහතුනයි');
        $inWord = $numberTransformer->toWordsDecimal(0.14, 'LKR');
        $this->assertEquals($inWord, 'ශත දහහතරයි');
        $inWord = $numberTransformer->toWordsDecimal(0.15, 'LKR');
        $this->assertEquals($inWord, 'ශත පහළොවයි');
        $inWord = $numberTransformer->toWordsDecimal(0.16, 'LKR');
        $this->assertEquals($inWord, 'ශත දහසයයි');
        $inWord = $numberTransformer->toWordsDecimal(0.17, 'LKR');
        $this->assertEquals($inWord, 'ශත දහහතයි');
        $inWord = $numberTransformer->toWordsDecimal(0.18, 'LKR');
        $this->assertEquals($inWord, 'ශත දහඅටයි');
        $inWord = $numberTransformer->toWordsDecimal(0.19, 'LKR');
        $this->assertEquals($inWord, 'ශත දහනවයයි');

        //ශත x 20
        $inWord = $numberTransformer->toWordsDecimal(0.2, 'LKR');
        $this->assertEquals($inWord, 'ශත විස්සයි');
        $inWord = $numberTransformer->toWordsDecimal(0.21, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි එකයි');
        $inWord = $numberTransformer->toWordsDecimal(0.22, 'LKR');
        $this->assertEquals($inWord, 'ශත විස්සයි');
        $inWord = $numberTransformer->toWordsDecimal(0.23, 'LKR');
        $this->assertEquals($inWord, 'ශත විස්සයි');
        $inWord = $numberTransformer->toWordsDecimal(0.24, 'LKR');
        $this->assertEquals($inWord, 'ශත විස්සයි');
        $inWord = $numberTransformer->toWordsDecimal(0.25, 'LKR');
        $this->assertEquals($inWord, 'ශත විස්සයි');

        $inWord = $numberTransformer->toWordsDecimal(0.3, 'LKR');
        $this->assertEquals($inWord, 'ශත තිහයි');

        // $inWord = $numberTransformer->toWordsDecimal(0.25, 'LKR');
        // $this->assertEquals($inWord, 'ශත විස්සs පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.5, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනහයි');

        // $inWord = $numberTransformer->toWordsDecimal(1.00, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(1.50, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් එකයි ශත පනහයි');

        // $inWord = $numberTransformer->toWordsDecimal(2.00, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් දෙකයි');

        // $inWord = $numberTransformer->toWordsDecimal(2.50, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් දෙකයි ශත පනහයි');

        // $inWord = $numberTransformer->toWordsDecimal(1.00, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් එකයි');

        // $inWord = $numberTransformer->toWordsDecimal(1.50, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් එකයි ශත පනහයි');

        // $this->assertEquals($inWord, 'රුපියල් එක සිය විස්සයි ශත පනහයි1');
        // $this->assertEquals($currencyToWords, 'ඩොලර් පනහයි ශත අනූ නවයයි');
    }
}

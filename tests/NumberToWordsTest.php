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

        // $inWord = $numberTransformer->toWordsDecimal(0.0, 'LKR');
        // $this->assertEquals($inWord, '');

        // //ශත x 1
        // $inWord = $numberTransformer->toWordsDecimal(0.01, 'LKR');
        // $this->assertEquals($inWord, 'ශත එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.02, 'LKR');
        // $this->assertEquals($inWord, 'ශත දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.03, 'LKR');
        // $this->assertEquals($inWord, 'ශත තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.04, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.05, 'LKR');
        // $this->assertEquals($inWord, 'ශත පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.06, 'LKR');
        // $this->assertEquals($inWord, 'ශත හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.07, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.08, 'LKR');
        // $this->assertEquals($inWord, 'ශත අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.09, 'LKR');
        // $this->assertEquals($inWord, 'ශත නවයයි');

        // //ශත x 10
        // $inWord = $numberTransformer->toWordsDecimal(0.10, 'LKR');
        // $this->assertEquals($inWord, 'ශත දහයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.11, 'LKR');
        // $this->assertEquals($inWord, 'ශත එකොළහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.12, 'LKR');
        // $this->assertEquals($inWord, 'ශත දොළහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.13, 'LKR');
        // $this->assertEquals($inWord, 'ශත දහතුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.14, 'LKR');
        // $this->assertEquals($inWord, 'ශත දහහතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.15, 'LKR');
        // $this->assertEquals($inWord, 'ශත පහළොවයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.16, 'LKR');
        // $this->assertEquals($inWord, 'ශත දහසයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.17, 'LKR');
        // $this->assertEquals($inWord, 'ශත දහහතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.18, 'LKR');
        // $this->assertEquals($inWord, 'ශත දහඅටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.19, 'LKR');
        // $this->assertEquals($inWord, 'ශත දහනවයයි');

        // //ශත x 20
        // $inWord = $numberTransformer->toWordsDecimal(0.20, 'LKR');
        // $this->assertEquals($inWord, 'ශත විස්සයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.21, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.22, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.23, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.24, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.25, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.26, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.27, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.28, 'LKR');
        // $this->assertEquals($inWord, 'ශත විසි අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.29, 'LKR'); //::BUG ::TODO - Thusithawijethunga - 1/15/2024
        // $this->assertEquals($inWord, 'ශත විසි නවයයි');

        // //ශත x 30
        // $inWord = $numberTransformer->toWordsDecimal(0.30, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.31, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.32, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.33, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.34, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.35, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.36, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.37, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.38, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.39, 'LKR');
        // $this->assertEquals($inWord, 'ශත තිස් නවයයි');

        // //ශත x 40
        // $inWord = $numberTransformer->toWordsDecimal(0.40, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතළිහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.41, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.42, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.43, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.44, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.45, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.46, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.47, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.48, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.49, 'LKR');
        // $this->assertEquals($inWord, 'ශත හතලිස් නවයයි');

        //ශත x 50
        // $inWord = $numberTransformer->toWordsDecimal(0.50, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.51, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.52, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.53, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.54, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.55, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.56, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.57, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.58, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.59, 'LKR');
        // $this->assertEquals($inWord, 'ශත පනස් නවයයි');

        //ශත x 60
        // $inWord = $numberTransformer->toWordsDecimal(0.6, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.61, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.62, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.63, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.64, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.65, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.66, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.67, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.68, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.69, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැට නවයයි');

        // //ශත x 70
        // $inWord = $numberTransformer->toWordsDecimal(0.70, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑවයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.71, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.72, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.73, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.74, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.75, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.76, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.77, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.78, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.79, 'LKR');
        // $this->assertEquals($inWord, 'ශත හැත්තෑ නවයයි');

        // //ශත x 80
        // $inWord = $numberTransformer->toWordsDecimal(0.80, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූවයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.81, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.82, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ දෙකයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.83, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ තුනයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.84, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ හතරයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.85, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.86, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ හයයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.87, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ හතයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.88, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ අටයි');
        // $inWord = $numberTransformer->toWordsDecimal(0.89, 'LKR');
        // $this->assertEquals($inWord, 'ශත අසූ නවයයි');

        //  //ශත x 90
        //  $inWord = $numberTransformer->toWordsDecimal(0.90, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූවයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.91, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ එකයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.92, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ දෙකයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.93, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ තුනයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.94, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ හතරයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.95, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ පහයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.96, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ හයයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.97, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ හතයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.98, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ අටයි');
        //  $inWord = $numberTransformer->toWordsDecimal(0.99, 'LKR');
        //  $this->assertEquals($inWord, 'ශත අනූ නවයයි');

        // $inWord = $numberTransformer->toWordsDecimal(1.00, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(1.05, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් එකයි ශත පහයි');
        // $inWord = $numberTransformer->toWordsDecimal(1.10, 'LKR');
        // $this->assertEquals($inWord, 'රුපියල් එකයි ශත දහයයි');
        $inWord = $numberTransformer->toWordsDecimal(1.15, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකයි');
        // $inWord = $numberTransformer->toWordsDecimal(1.20, 'LKR');
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

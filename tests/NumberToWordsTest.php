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

        # ශත x 1
        $inWord = $numberTransformer->toWordsDecimal(0.01, 'LKR');
        $this->assertEquals($inWord, 'ශත එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.02, 'LKR');
        $this->assertEquals($inWord, 'ශත දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.03, 'LKR');
        $this->assertEquals($inWord, 'ශත තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.04, 'LKR');
        $this->assertEquals($inWord, 'ශත හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.05, 'LKR');
        $this->assertEquals($inWord, 'ශත පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.06, 'LKR');
        $this->assertEquals($inWord, 'ශත හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.07, 'LKR');
        $this->assertEquals($inWord, 'ශත හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.08, 'LKR');
        $this->assertEquals($inWord, 'ශත අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.09, 'LKR');
        $this->assertEquals($inWord, 'ශත නවයක් පමණි');

        # ශත x 10
        $inWord = $numberTransformer->toWordsDecimal(0.10, 'LKR');
        $this->assertEquals($inWord, 'ශත දහයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.11, 'LKR');
        $this->assertEquals($inWord, 'ශත එකොළහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.12, 'LKR');
        $this->assertEquals($inWord, 'ශත දොළහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.13, 'LKR');
        $this->assertEquals($inWord, 'ශත දහතුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.14, 'LKR');
        $this->assertEquals($inWord, 'ශත දහහතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.15, 'LKR');
        $this->assertEquals($inWord, 'ශත පහළොවක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.16, 'LKR');
        $this->assertEquals($inWord, 'ශත දහසයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.17, 'LKR');
        $this->assertEquals($inWord, 'ශත දහහතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.18, 'LKR');
        $this->assertEquals($inWord, 'ශත දහඅටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.19, 'LKR');
        $this->assertEquals($inWord, 'ශත දහනවයක් පමණි');

        # ශත x 20
        $inWord = $numberTransformer->toWordsDecimal(0.20, 'LKR');
        $this->assertEquals($inWord, 'ශත විස්සක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.21, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.22, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.23, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.24, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.25, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.26, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.27, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.28, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.29, 'LKR');
        $this->assertEquals($inWord, 'ශත විසි නවයක් පමණි');

        # ශත x 30
        $inWord = $numberTransformer->toWordsDecimal(0.30, 'LKR');
        $this->assertEquals($inWord, 'ශත තිහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.31, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.32, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.33, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.34, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.35, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.36, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.37, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.38, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.39, 'LKR');
        $this->assertEquals($inWord, 'ශත තිස් නවයක් පමණි');

        // # ශත x 40
        $inWord = $numberTransformer->toWordsDecimal(0.40, 'LKR');
        $this->assertEquals($inWord, 'ශත හතළිහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.41, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.42, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.43, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.44, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.45, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.46, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.47, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.48, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.49, 'LKR');
        $this->assertEquals($inWord, 'ශත හතලිස් නවයක් පමණි');

        # ශත x 50
        $inWord = $numberTransformer->toWordsDecimal(0.50, 'LKR');
        $this->assertEquals($inWord, 'ශත පනහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.51, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.52, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.53, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.54, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.55, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.56, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.57, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.58, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.59, 'LKR');
        $this->assertEquals($inWord, 'ශත පනස් නවයක් පමණි');

        # ශත x 60
        $inWord = $numberTransformer->toWordsDecimal(0.6, 'LKR');
        $this->assertEquals($inWord, 'ශත හැටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.61, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.62, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.63, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.64, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.65, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.66, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.67, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.68, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.69, 'LKR');
        $this->assertEquals($inWord, 'ශත හැට නවයක් පමණි');

        # ශත x 70
        $inWord = $numberTransformer->toWordsDecimal(0.70, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑවක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.71, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.72, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.73, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.74, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.75, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.76, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.77, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.78, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.79, 'LKR');
        $this->assertEquals($inWord, 'ශත හැත්තෑ නවයක් පමණි');

        # ශත x 80
        $inWord = $numberTransformer->toWordsDecimal(0.80, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූවක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.81, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.82, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ දෙකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.83, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ තුනක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.84, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ හතරක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.85, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.86, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ හයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.87, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ හතක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.88, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ අටක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(0.89, 'LKR');
        $this->assertEquals($inWord, 'ශත අසූ නවයක් පමණි');

         # ශත x 90
         $inWord = $numberTransformer->toWordsDecimal(0.90, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූවක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.91, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ එකක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.92, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ දෙකක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.93, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ තුනක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.94, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ හතරක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.95, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ පහක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.96, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ හයක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.97, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ හතක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.98, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ අටක් පමණි');
         $inWord = $numberTransformer->toWordsDecimal(0.99, 'LKR');
         $this->assertEquals($inWord, 'ශත අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(1.00, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(1.05, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකයි ශත පහක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(1.10, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකයි ශත දහයක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(1.15, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකයි ශත පහළොවක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(1.20, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකයි ශත විස්සක් පමණි');
        $inWord = $numberTransformer->toWordsDecimal(1.50, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකයි ශත පනහක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(2.00, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් දෙකක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(2.50, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් දෙකයි ශත පනහක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(1.00, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(1.50, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් එකයි ශත පනහක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(56500.32, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් පනස් හය දහස් පන් සියයි ශත තිස් දෙකක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(965265.32, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නව සිය හැට පහ දහස් දෙ සිය හැට පහයි ශත තිස් දෙකක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(99, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(9999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(99999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(9999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(99999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(999999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(9999999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නවය බිලියන නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');
        
        $inWord = $numberTransformer->toWordsDecimal(99999999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් අනූ නවය බිලියන නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(99999999999.99, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් අනූ නවය බිලියන නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයයි ශත අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(999999999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නව සිය අනූ නවය බිලියන නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(9999999999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නවය ට්‍රිලියන නව සිය අනූ නවය බිලියන නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(99999999999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් අනූ නවය ට්‍රිලියන නව සිය අනූ නවය බිලියන නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(999999999999999, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් නව සිය අනූ නවය ට්‍රිලියන නව සිය අනූ නවය බිලියන නව සිය අනූ නවය මිලියන නව සිය අනූ නවය දහස් නව සිය අනූ නවයක් පමණි');
        
        $inWord = $numberTransformer->toWordsDecimal(25240.50, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් විසි පහ දහස් දෙ සිය හතළිහයි ශත පනහක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(25240.00, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් විසි පහ දහස් දෙ සිය හතළිහක් පමණි');

        $inWord = $numberTransformer->toWordsDecimal(3521.00, 'LKR');
        $this->assertEquals($inWord, 'රුපියල් තුන දහස් පන් සිය විසි එකක් පමණි');
        
    }
}

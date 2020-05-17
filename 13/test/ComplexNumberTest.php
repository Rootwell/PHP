<?php

require_once "complexNumber\ComplexNumber.php";

use complexNumber\ComplexNumber;
use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd()
    {
        $firstComplexNumber = new ComplexNumber(2, 3);
        $secondComplexNumber = new ComplexNumber(5, -7);
        $rightResult = new ComplexNumber(7, -4);
        $firstComplexNumber->add($secondComplexNumber);
        self::assertEquals($rightResult, $firstComplexNumber);
    }

    public function testSub()
    {
        $firstComplexNumber = new ComplexNumber(2, 3);
        $secondComplexNumber = new ComplexNumber(5, -7);
        $rightResult = new ComplexNumber(-3, 10);
        $firstComplexNumber->sub($secondComplexNumber);
        self::assertEquals($rightResult, $firstComplexNumber);
    }

    public function testMult()
    {
        $firstComplexNumber = new ComplexNumber(2, 3);
        $secondComplexNumber = new ComplexNumber(5, -7);
        $rightResult = new ComplexNumber(31, 1);
        $firstComplexNumber->mult($secondComplexNumber);
        self::assertEquals($rightResult, $firstComplexNumber);
    }

    public function testABS()
    {
        $complexNumber = new ComplexNumber(2, -5);
        $expected = 5.38516;
        self::assertEquals($expected, $complexNumber->abs());
    }

    public function testDiv()
    {
        $firstComplexNumber = new ComplexNumber(7,5);
        $secondComplexNumber = new ComplexNumber(3, -4);
        $expected = new ComplexNumber(0.04, 1.72);
        $firstComplexNumber->div($secondComplexNumber);
        self::assertEquals($expected, $firstComplexNumber);
    }
}
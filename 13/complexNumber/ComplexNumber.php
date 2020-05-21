<?php

namespace complexNumber;

class ComplexNumber
{
    private float $real;

    private float $imaginary;

    /**
     * @return float
     */
    public function getReal(): float
    {
        return $this->real;
    }

    /**
     * @param int $real
     */
    public function setReal(int $real): void
    {
        $this->real = $real;
    }

    /**
     * @return float
     */
    public function getImaginary(): float
    {
        return $this->imaginary;
    }

    /**
     * @param int $imaginary
     */
    public function setImaginary(int $imaginary): void
    {
        $this->imaginary = $imaginary;
    }

    /**
     * ComplexNumber constructor.
     * @param int $real
     * @param int $imaginary
     */
    public function __construct(float $real, float $imaginary)
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }


    public function __toString()
    {
        return $this->real . "+(" . $this->imaginary . "i)";
    }

    public function add(ComplexNumber $complexNumber)
    {
        $this->real = $this->real + $complexNumber->getReal();
        $this->imaginary = $this->imaginary + $complexNumber->getImaginary();
    }

    public function sub(ComplexNumber $complexNumber)
    {
        $this->real = $this->real - $complexNumber->getReal();
        $this->imaginary = $this->imaginary - $complexNumber->getImaginary();
    }

    public function mult(ComplexNumber $complexNumber)
    {
        $thisTmpReal = $this->real;
        $thisTmpImaginary = $this->imaginary;
        $this->real = $thisTmpReal * $complexNumber->getReal() - $thisTmpImaginary * $complexNumber->getImaginary();
        $this->imaginary = $thisTmpImaginary * $complexNumber->getReal() + $thisTmpReal * $complexNumber->getImaginary();
    }

    public function div(ComplexNumber $complexNumber)
    {
        $thisTmpReal = $this->real;
        $thisTmpImaginary = $this->imaginary;
        $divisor = $complexNumber->getReal() * $complexNumber->getReal() + $complexNumber->getImaginary() * $complexNumber->getImaginary();
        $tmp = new ComplexNumber($complexNumber->getReal(), -$complexNumber->getImaginary());
        if ($divisor != 0) {
            $this->real = ($thisTmpReal * $tmp->getReal() - $thisTmpImaginary * $tmp->getImaginary()) / $divisor;
            $this->imaginary = ($thisTmpImaginary * $tmp->getReal() + $thisTmpReal * $tmp->getImaginary()) / $divisor;
        } else {
            echo "Division by zero";
        }
    }

    public function abs():float
    {
        return sqrt($this->real*$this->real + $this->imaginary*$this->imaginary);
    }
}
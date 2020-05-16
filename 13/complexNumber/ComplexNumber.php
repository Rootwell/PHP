<?php

namespace complexNumber;

class ComplexNumber
{
    private float $real;

    private float $imaginary;

    /**
     * @return int
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
     * @return int
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
        $this->real = $this->real * $complexNumber->getReal() - $this->imaginary * $complexNumber->getImaginary();
        $this->imaginary = $this->imaginary * $complexNumber->getReal() + $this->real * $complexNumber->getImaginary();
    }

    public function div(ComplexNumber $complexNumber)
    {
        $divisor = $complexNumber->getReal() * $complexNumber->getReal() + $complexNumber->getImaginary() * $complexNumber->getImaginary();
        $tmp = new ComplexNumber($complexNumber->getReal(), -$complexNumber->getImaginary());
        if ($divisor != 0) {
            $this->real = $this->real * $tmp->getReal() - $this->imaginary * $tmp->getImaginary() / $divisor;
            $this->imaginary = $this->imaginary * $tmp->getReal() + $this->real * $tmp->getImaginary() / $divisor;
        } else {
            echo "Division by zero";
        }
    }

    public function abs():float
    {
        return sqrt($this->real*$this->real + $this->imaginary*$this->imaginary);
    }
}
<?php

declare(strict_types = 1);

namespace App;
use App\Operations\IOperation;

/**
 * Class Calculator
 * @package App
 */
class Calculator implements ICalculator
{
    private $operation;
    private $operands = array();

    public function addOperand(int $operand)
    {
        $this->operands[] = $operand;
    }

    public function setOperation(IOperation $operation)
    {
        $this->operation = $operation;
    }

    public function process() : int
    {
        return $this->operation->exec($this->operands);
    }

    public function getCurrentOperands()
    {
        return $this->operands;
    }

    public function reset () {
        $this->operands = [];
    }
}







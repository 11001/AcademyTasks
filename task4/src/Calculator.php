<?php

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

    /**
     * Add operand for calculation
     *
     * @param int $operand
     */
    public function addOperand(int $operand)
    {
        $this->operands[] = $operand;
    }

    /**
     * Set type of operation
     *
     * @param IOperation $operation
     */
    public function setOperation(IOperation $operation)
    {
        $this->operation = $operation;
    }

    /**
     * Process result
     *
     * @return mixed
     */
    public function process() : int
    {
        return $this->operation->exec($this->operands);
    }

    /**
     * Get current input
     *
     * @return array
     */
    public function getCurrentOperands()
    {
        return $this->operands;
    }

    /**
     * Reset input
     */
    public function reset()
    {
        $this->operands = [];
    }
}







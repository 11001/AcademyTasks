<?php

namespace App\Operations;

/**
 * Class Addition
 * @package App\Operations
 */
class Addition extends Operation
{
    /**
     * Query exec
     * @param array $operands
     * @return mixed|void
     * @internal param string $option
     */
    public function exec(array &$operands = array()) : int
    {
        self::checkOperands($operands);
        $result = array_sum($operands);
        $this->logger->log($this, $operands, $result);
        self::updateResult($operands, $result);
        return $result;
    }
}

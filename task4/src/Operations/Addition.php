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
        if (self::checkOperands($operands)) return 0;
        $result = array_sum($operands);
        $this->logger->log($this, $operands, $result);
        self::updateResult($operands, $result);
        return $result;
    }
}

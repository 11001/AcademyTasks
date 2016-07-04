<?php

namespace App\Operations;

/**
 * Class Module2
 * @package App\Operations
 */
class Module2 extends Operation
{
    /**
     * Query exec
     * @param array $operands
     * @return mixed|void
     * @internal param string $option
     */
    public function exec(array &$operands = array()) : int
    {
        if (self::checkOperands($operands)) return;
        if (count($operands) > 1) throw new ArithmeticalError();
        $result = intval(2 ** $operands[0]);
        $this->logger->log($this, $operands, $result);
        self::updateResult($operands, $result);
        return $result;
    }
}

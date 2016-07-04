<?php

namespace App\Operations;

/**
 * Class Division
 * @package App\Operations
 */
class Division extends Operation
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
        $result = $operands[0];
        for ($i = 1; $i < count($operands); $i++) {
            if ($operands[$i] === 0 ) throw new DivisionByZeroError();
            $result = intdiv($result, $operands[$i]);
        }
        $this->logger->log($this, $operands, $result);
        self::updateResult($operands, $result);
        return $result;
    }
}

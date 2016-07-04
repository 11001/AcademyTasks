<?php

namespace App\Operations;

class Multiply extends Operation
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
        $result = array_product($operands);
        $this->logger->log($this, $operands, $result);
        self::updateResult($operands, $result);
        return $result;
    }
}

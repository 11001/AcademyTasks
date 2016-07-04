<?php

namespace App\Operations;

/**
 * Class Operation
 * @package App\Operations
 */
abstract class Operation implements IOperation
{
    /**
     * Logger
     * @var
     */
    protected $logger;

    /**
     * Init required objects
     */
    public function __construct()
    {
        $this->logger = (new class
    {
        public function log($operation, array $operands, int $result)
        {
            $file = 'logs.txt';
            $data = PHP_EOL . date('c') . " " . $operation . " Operands: " . implode(',', $operands) . " Result:" . $result . PHP_EOL;
            file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        }
    });
    }

    /**
     * Checks for input
     *
     * @param array $operands
     * @return bool
     */
    protected function checkOperands(array $operands)
    {
            if (!count($operands)) throw new \ArithmeticError();
    }

    /**
     * Result of calculation is the first operand
     *
     * @param array $operands
     * @param int $result
     */
    protected function updateResult(array &$operands, int $result)
    {
        $operands = [];
        $operands[] = $result;
    }

    /**
     * Get name of operation
     *
     * @return string
     */
    public function __toString()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}

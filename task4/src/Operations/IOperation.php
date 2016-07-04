<?php

namespace App\Operations;

/**
 * Interface IOperation
 * @package App\Operations
 */
interface IOperation
{
    /**
     * Run query
     * @param $option
     * @return mixed
     */
    public function exec(array &$option) : int;
}
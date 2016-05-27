<?php

namespace App\Commands;

use App\Exceptions\CommandException;

abstract class Command implements \ICommand
{
    protected function checkOptions(&$options)
    {
        if (count($options) > 1 || !((int) $options[0])) {
            throw new CommandException("Option is invalid");
        }
        $options = $options[0];
    }
}

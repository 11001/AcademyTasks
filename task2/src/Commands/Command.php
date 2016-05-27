<?php

namespace App\Commands;

use App\Exceptions\CommandException;

/**
 * Class Command
 * @package App\Commands
 */
abstract class Command implements \ICommand
{
    /**
     * Check if options are valid
     * @param $options
     * @throws CommandException
     */
    protected function checkOptions(&$options)
    {
        if (count($options) > 1 || !((int) $options[0])) {
            throw new CommandException("Option is invalid");
        }
        $options = $options[0];
    }
}

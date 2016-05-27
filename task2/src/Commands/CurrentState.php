<?php

namespace App\Commands;

use App\Lift;

/**
 * Command to get current state for a lift
 * Class CurrentState
 * @package App\Commands
 */
class CurrentState extends Command
{
    /**
     * Query exec
     * @param string $option
     */
    public static function exec($option = '')
    {
        fwrite(STDOUT, Lift::getInstance()->getStatus());
    }
}

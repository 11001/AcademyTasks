<?php

namespace App\Commands;

use App\Lift;

/**
 * Unload people on stage
 * Class UnloadPeople
 * @package App\Commands
 */
class UnloadPeople extends Command
{
    /**
     * Query exec
     * @param $option
     * @throws \App\Exceptions\CommandException
     */
    public static function exec($option)
    {
        $lift = Lift::getInstance();
        self::checkOptions($option);
        $lift->unloadPeople($option);
        fwrite(STDOUT, Lift::getInstance());
    }

}
<?php

namespace App\Commands;

use App\Lift;

/**
 * Command to load people
 * Class LoadPeople
 * @package App\Commands
 */
class LoadPeople extends Command
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
        $lift->loadPeople($option);
        fwrite(STDOUT, Lift::getInstance());
    }

}
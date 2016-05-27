<?php

namespace App\Commands;

use App\Lift;

/**
 * Command to send lift on required stage
 * Class SendLift
 * @package App\Commands
 */
class SendLift extends Command
{
    /**
     * Query exec
     * @param $option
     * @throws \App\Exceptions\CommandException
     */
    public static function exec($option) {
        $lift = Lift::getInstance();
        self::checkOptions($option);
        $lift->sendLift($option);
        fwrite(STDOUT, Lift::getInstance());
    }

}
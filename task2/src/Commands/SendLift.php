<?php

namespace App\Commands;

use App\Lift;

class SendLift extends Command
{
    public static function exec($option) {
        $lift = Lift::getInstance();
        self::checkOptions($option);
        $lift->sendLift($option);
        fwrite(STDOUT, Lift::getInstance());
    }

}
<?php

namespace App\Commands;

use App\Lift;

class UnloadPeople extends Command
{
    public static function exec($option)
    {
        $lift = Lift::getInstance();
        self::checkOptions($option);
        $lift->unloadPeople($option);
        fwrite(STDOUT, Lift::getInstance());
    }

}
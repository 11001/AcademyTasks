<?php

namespace App\Commands;

use App\Lift;

class LoadPeople extends Command
{
    public static function exec($option)
    {
        $lift = Lift::getInstance();
        self::checkOptions($option);
        $lift->loadPeople($option);
        fwrite(STDOUT, Lift::getInstance());
    }

}
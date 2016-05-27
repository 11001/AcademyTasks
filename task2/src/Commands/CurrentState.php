<?php

namespace App\Commands;

use App\Lift;

class CurrentState extends Command
{
    public static function exec($option = '')
    {
        fwrite(STDOUT, Lift::getInstance()->getStatus());
    }
}

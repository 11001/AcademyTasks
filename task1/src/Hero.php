<?php

namespace Marvel;

abstract class Hero
{
    public static function whoami()
    {
        $name = explode("\\", get_called_class());
        $class_name = $name[count($name) - 1];
        $house_name = $name[count($name) - 2];
        $land_name = $name[count($name) - 2];
        return 'I\'m '. $class_name .' from ' . $land_name;
    }
}

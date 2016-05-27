<?php

interface ICommand
{
    /**
     * Run query
     * @param $option
     * @return mixed
     */
    public static function exec($option);
}
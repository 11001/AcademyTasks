<?php

namespace Configs;

class Config
{
    private static $instance;
    private $configs;

    private function __construct()
    {
        $this->configs = parse_ini_file('config.ini');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function getSetting($setting_name)
    {
        return $this->configs[$setting_name];
    }
}

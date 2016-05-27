<?php

namespace Configs;

/**
 * Settings for lift. Must be like singleton
 * Class Config
 * @package Configs
 */
class Config
{
    /**
     * instance
     * @var
     */
    private static $instance;

    /**
     * Contents of settings
     * @var array
     */
    private $configs;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $this->configs = parse_ini_file('config.ini');
    }

    /**
     * Get only one instance
     * @return Config
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    /**
     * Getter for settings
     * @param $setting_name
     * @return mixed
     */
    public function getSetting($setting_name)
    {
        return $this->configs[$setting_name];
    }
}

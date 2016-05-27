<?php

namespace App;

use Configs\Config;

class Lift implements ILift
{
    private static $instance;
    private $maxStage;
    private $minStage;
    private $maxCapacity;
    private $currentStage;
    private $currentCapacity = 0;

    private function __construct($maxStage, $minStage, $maxCapacity)
    {
        $this->maxStage = $maxStage;
        $this->minStage = $minStage;
        $this->maxCapacity = $maxCapacity;
        $this->currentStage = $minStage;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            $config = Config::getInstance();
            $minStage = $config->getSetting('MIN_STAGE');
            $maxStage = $config->getSetting('MAX_STAGE');
            $maxCapacity = $config->getSetting('MAX_CAPACITY');
            self::$instance = new Lift($maxStage, $minStage, $maxCapacity);
        }
        return self::$instance;
    }

    function __set($name, $value)
    {
        if ($name == 'currentStage') {
            $this->sendLift($value);
        }
        if ($name == 'currentCapacity') {
            $this->loadPeople($value);
        }
    }

    private function printError($message)
    {
        echo "Some invalid exception: " . $message . PHP_EOL;
    }

    public function sendLift($numberOfStage)
    {
        $checkLift = $this->checkLift($numberOfStage);
        if ($checkLift) $this->currentStage = $numberOfStage;
    }

    public function loadPeople($numberOfPeople)
    {
        if ($numberOfPeople + $this->currentCapacity > $this->maxCapacity) $this->printError('It is so load');
        $this->currentCapacity += $numberOfPeople;
    }

    public function unloadPeople($numberOfPeople)
    {
        if ($numberOfPeople > $this->currentCapacity) {
            $this->printError('It is invalid number');
            return;
        } else if ($this->currentCapacity - $numberOfPeople > $this->maxCapacity) {
            $this->printError('Still a lot of people');
        }
        $this->currentCapacity -= $numberOfPeople;
    }

    private function checkLift($numberOfStage)
    {
        $checkLift = true;
        if ($this->currentCapacity > $this->maxCapacity) {
            $this->printError('Lift is overload. Impossible to move');
            $checkLift = false;
        }
        if ($numberOfStage < $this->minStage || $numberOfStage > $this->maxStage) {
            $this->printError('It is invalid stage');
            $checkLift = false;
        }
        return $checkLift;
    }

    public function getStatus()
    {
        return $this;
    }

    public function __toString()
    {
        return 'Stage: ' . $this->currentStage . ', people: ' . $this->currentCapacity . PHP_EOL;
    }
}







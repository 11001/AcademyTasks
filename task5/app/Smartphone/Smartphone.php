<?php

namespace App\Smartphone;

/**
 * Class Smartphone
 * @package App\Smartphone
 */
class Smartphone
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var CPU
     */
    private $cpu;

    /**
     * @var Camera
     */
    private $camera;

    /**
     * @var Battery
     */
    private $battery;

    /**
     * @var Display
     */
    private $display;

    /**
     * Smartphone constructor.
     * @param $name
     * @param $cpu
     * @param $camera
     * @param $battery
     * @param $display
     */
    public function __construct(string $name, CPU $cpu, Camera $camera, Battery $battery, Display $display)
    {
        $this->name = $name;
        $this->cpu = $cpu;
        $this->camera = $camera;
        $this->battery = $battery;
        $this->display = $display;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return CPU
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * @param CPU $cpu
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;
    }

    /**
     * @return Camera
     */
    public function getCamera()
    {
        return $this->camera;
    }

    /**
     * @param Camera $camera
     */
    public function setCamera($camera)
    {
        $this->camera = $camera;
    }

    /**
     * @return Battery
     */
    public function getBattery()
    {
        return $this->battery;
    }

    /**
     * @param Battery $battery
     */
    public function setBattery($battery)
    {
        $this->battery = $battery;
    }

    /**
     * @return Display
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * @param Display $display
     */
    public function setDisplay($display)
    {
        $this->display = $display;
    }



    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->name . ', ' . $this->cpu . $this->display . $this->camera . $this->battery;
    }
}
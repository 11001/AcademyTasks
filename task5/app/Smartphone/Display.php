<?php

namespace App\Smartphone;

/**
 * Class Display
 * @package App\Smartphone
 */
class Display
{
    /**
     * @var int
     */
    private $resolutionX;

    /**
     * @var int
     */
    private $resolutionY;

    /**
     * @param mixed $resolutionX
     */
    public function setResolutionX(int $resolutionX)
    {
        $this->resolutionX = $resolutionX;
    }

    /**
     * @param mixed $resolutionY
     */
    public function setResolutionY(int $resolutionY)
    {
        $this->resolutionY = $resolutionY;
    }

    /**
     * Camera constructor.
     *
     * @param $resolutionX
     * @param $resolutionY
     */
    public function __construct(int $resolutionX, int $resolutionY)
    {
        $this->resolutionX = $resolutionX;
        $this->resolutionY = $resolutionY;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->resolutionX  . 'x' . $this->resolutionY . ' display, ';
    }
}
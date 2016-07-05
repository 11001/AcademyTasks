<?php

namespace App\Smartphone;

class Camera
{
    /**
     * @var int
     */
    private $mpixels;

    /**
     * Camera constructor.
     * @param $mpixels
     */
    public function __construct(int $mpixels)
    {
        $this->mpixels = $mpixels;
    }

    /**
     * @param mixed $mpixels
     */
    public function setMpixels(int $mpixels)
    {
        $this->mpixels = $mpixels;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->mpixels . '  megapixels camera, ';
    }
}
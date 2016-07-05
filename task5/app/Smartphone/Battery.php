<?php

namespace App\Smartphone;

class Battery
{
    /**
     * @var
     */
    private $capacity;

    /**
     * Battery constructor.
     * @param $capacity
     */
    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity(int $capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return 'Capacity: ' . $this->capacity . ' ';
    }
}
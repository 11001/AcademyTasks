<?php

namespace App\Smartphone;

/**
 * Class CPU
 * @package App\Smartphone
 */
class CPU
{
    /**
     * @var string
     */
    private $vendor;

    /**
     * @var int
     */
    private $cores;

    /**
     * @param mixed $vendor
     */
    public function setVendor(string $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @param mixed $cores
     */
    public function setCores(int $cores)
    {
        $this->cores = $cores;
    }

    /**
     * CPU constructor.
     *
     * @param $vendor
     * @param $cores
     */
    public function __construct(string $vendor, int $cores)
    {
        $this->vendor = $vendor;
        $this->cores = $cores;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->vendor  . ' ' . $this->cores . ' cores, ';
    }
}
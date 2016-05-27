<?php

namespace App;

/**
 * Interface ILift
 * @package App
 */
interface ILift
{
    /**
     * Send lift on stage
     * @param $numberOfStage
     * @return mixed
     */
    public function sendLift($numberOfStage);

    /**
     * Load people
     * @param $numberOfPeople
     * @return mixed
     */
    public function loadPeople($numberOfPeople);

    /**
     * upload people
     * @param $numberOfPeople
     * @return mixed
     */
    public function unloadPeople($numberOfPeople);

    /**
     * Return status
     * @return mixed
     */
    public function getStatus();
}




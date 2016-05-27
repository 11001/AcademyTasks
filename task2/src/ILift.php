<?php

namespace App;

interface ILift
{
    public function sendLift($numberOfStage);

    public function loadPeople($numberOfPeople);

    public function unloadPeople($numberOfPeople);

    public function getStatus();
}




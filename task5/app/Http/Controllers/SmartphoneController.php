<?php

namespace App\Http\Controllers;

use App\Smartphone\Smartphone;
use App\Http\Requests;

class SmartphoneController extends Controller
{
    private $smartphone;

    public function __construct(Smartphone $smartphone)
    {
        $this->smartphone = $smartphone;
    }

    public function index()
    {
        return $this->smartphone;
    }
}

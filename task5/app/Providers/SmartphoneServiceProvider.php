<?php

namespace App\Providers;

use App\Smartphone\{Smartphone, Battery, Camera, CPU, Display};

use Illuminate\Support\ServiceProvider;

class SmartphoneServiceProvider extends ServiceProvider {


    public function register()
    {
        $this->app->bind(Smartphone::class, function() {
            $battery = new Battery('1000');
            $camera = new Camera('10');
            $cpu = new CPU('Qualcomm 5555', '2');
            $display = new Display('1000', '1000');
            $smartphone = new Smartphone('Apple iPhone', $cpu, $camera, $battery, $display);
            return $smartphone;
        });
    }

    public function boot()
    {

    }
}
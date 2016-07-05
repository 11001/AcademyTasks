<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/shorten', function () {
    $long_url = 'http://wwww.google.com';
    $short_url = \Shorten::url($long_url); // returns the short version of the long_url as a string
    return $short_url;
});

Route::resource('phone', 'SmartphoneController', [
   'except' => 'show', 'create', 'store', 'update', 'edit', 'destroy',
   'names' => [
       'index' => 'phone.index',
       'create' => 'phone.create',
       'store' => 'phone.store',
       'show' => 'phone.show',
       'update' => 'phone.update',
       'edit' => 'phone.edit',
       'destroy' => 'phone.destroy',
   ],
]);
<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BookValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|alpha',
            'year' => 'required|integer',
            'author' => 'required|alpha',
            'genre' => 'required|alpha',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required|alpha',
            'year' => 'required|integer',
            'author' => 'required|alpha',
            'genre' => 'required|alpha',
        ],
   ];
}

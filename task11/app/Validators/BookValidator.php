<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BookValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|string',
            'year' => 'required|integer',
            'author' => 'required|string',
            'genre' => 'required|string',
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}

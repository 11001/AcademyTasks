<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Book extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps = false;

    protected $fillable = ['title', 'author', 'year', 'genre'];

    public function users()
    {
        return $this->belongsToMany('App\Entities\User');
    }
}

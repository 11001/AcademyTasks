<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DCN\RBAC\Traits\HasRoleAndPermission;
use DCN\RBAC\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements Transformable,  HasRoleAndPermissionContract
{
    use TransformableTrait, HasRoleAndPermission;

    public $timestamps = false;

    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    public function books()
    {
        return $this->belongsToMany('App\Entities\Book');
    }
}

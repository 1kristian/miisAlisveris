<?php


namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use HasRoleAndPermission;

    protected $fillable = [
        "name", "email", "password",
    ];

    protected $hidden = [
        "password", "remember_token",
    ];

}

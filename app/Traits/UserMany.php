<?php
namespace App\Traits;

use App\Right;
use App\Role;

trait UserMany
{
    public function rights()
    {
        return $this->belongsToMany(Right::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}

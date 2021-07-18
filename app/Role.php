<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'view_name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function rights()
    {
        return $this->belongsToMany(Right::class);
    }
}

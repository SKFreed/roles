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

    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) { //
                return true;
            }
        }
        return false;
    }

    /**
     * @param $right
     * @return bool
     */
    public function hasRight($right)
    {
        return (bool)$this->rights->where('name', $right)->count(); //
    }

    /**
     * @param $right
     * @return bool
     */
    public function hasRightTo($right)
    {
        return $this->hasRightThroughRole($right) || $this->hasRight($right->name); //$this->hasRight($right)
}


    /**
     * @param $right
     * @return bool
     */
    public function hasRightThroughRole($right)
    {
        foreach ($right->roles as $role){
            if($this->roles->contains($role)) { //
                return true;
            }
        }
        return false;
    }

    /**
     * @param array $rights
     * @return mixed
     */
    public function getAllRights(array $rights)
    {
        return Right::whereIn('name',$rights)->get();
    }
    /**
     * @param mixed ...$rights
     * @return $this
     */
    public function giveRightsTo(... $rights)
    {
        $rights = $this->getAllRights($rights);
        if($rights === null) {
            return $this;
        }
        $this->rights()->saveMany($rights);
        return $this;
    }

    /**
     * @param mixed ...$rights
     * @return $this
     */
    public function deleteRights(... $rights )
    {
        $rights = $this->getAllRights($rights);
        $this->rights()->detach($rights);
        return $this;
    }
    /**
     * @param mixed ...$rights
     * @return UserMany
     */
    public function refreshRights(... $rights )
    {
        $this->rights()->detach();
        return $this->giveRightsTo($rights);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    public function permissions()
    {
        return $this->hasMany(RolePermission::class, 'roleId');

    } // end function





    public function users()
    {
        return $this->hasMany(User::class, 'roleId');

    } // end function







    // -----------------------------------------------
    // -----------------------------------------------
    // -----------------------------------------------
    // -----------------------------------------------







    public function permissionsInArray()
    {



        // 1: getPermissions - convert
        $permissionsList = $this?->permissions()?->get()?->pluck('permissionId')?->toArray() ?? [];
        $permissionsInArray = Permission::whereIn('id', $permissionsList)->get()?->pluck('name')?->toArray() ?? [];




        // :: return
        return $permissionsInArray;


    } // end function









    // -----------------------------------------------







    public function usersInArray()
    {



        // 1: getUsers - convert
        $usersInArray = $this?->users()?->get()?->pluck('name')?->toArray() ?? [];




        // :: return
        return $usersInArray;


    } // end function







} // end model

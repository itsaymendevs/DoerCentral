<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $roles = ['Administration'];
        $permissions = Permission::all();


        for ($i = 0; $i < count($roles); $i++) {


            $singleRole = Role::create([
                'name' => $roles[$i],
            ]);



            foreach ($permissions as $permission) {
                RolePermission::create([
                    'roleId' => $singleRole->id,
                    'permissionId' => $permission->id,
                    'isAllowed' => true,
                ]);
            } // end loop




        } // end loop





        // ----------------------------------
        // ----------------------------------






    } // end function



} // end seeder




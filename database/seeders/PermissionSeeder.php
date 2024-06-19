<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PermissionSeeder extends Seeder
{

    public function run() : void
    {


        // ::root
        $permissions = Storage::disk('public')->get('sources/Permissions.json');
        $permissions = json_decode($permissions, true);


        for ($i = 0; $i < count($permissions); $i++) {
            Permission::create([
                'name' => $permissions[$i]['name'],
                'route' => $permissions[$i]['route'],
                'group' => $permissions[$i]['group'],
            ]);
        } // end loop


    } // end function


} // end class

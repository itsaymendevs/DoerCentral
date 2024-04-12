<?php

namespace Database\Seeders;

use App\Models\VersionPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersionPermissionSeeder extends Seeder
{

    public function run() : void
    {

        // ::root
        VersionPermission::create([
            'isProcessing' => true,
            'hasMasterView' => true,
            'hasWallet' => true,
            'hasDynamicBundle' => true,
        ]);


    } // end function



} // end seeder

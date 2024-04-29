<?php

namespace Database\Seeders;

use App\Models\InstructionTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionTagSeeder extends Seeder
{

    public function run() : void
    {


        // ::root
        $instructionTag = ['Heat', 'Remove Lid', 'Enjoy'];

        for ($i = 0; $i < count($instructionTag); $i++) {
            InstructionTag::create([

                'name' => $instructionTag[$i],

            ]);
        } // end loop


    } // end function



} // end seeder



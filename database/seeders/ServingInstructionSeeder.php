<?php

namespace Database\Seeders;

use App\Models\ServingInstruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServingInstructionSeeder extends Seeder
{

    public function run() : void
    {


        // ::root
        $servingInstruction = ['Enjoy guilt free!', 'Remove Lid, heat, enjoy!', 'Eat Cold!'];

        for ($i = 0; $i < count($servingInstruction); $i++) {
            ServingInstruction::create([

                'name' => $servingInstruction[$i],

            ]);
        } // end loop


    } // end function



} // end seeder



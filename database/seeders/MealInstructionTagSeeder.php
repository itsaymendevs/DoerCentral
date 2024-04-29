<?php

namespace Database\Seeders;

use App\Models\InstructionTag;
use App\Models\Meal;
use App\Models\MealInstructionTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealInstructionTagSeeder extends Seeder
{



    public function run() : void
    {


        // 1: dependencies
        $meals = Meal::all();
        $instructionTags = InstructionTag::all();





        // 1.2: loop - meals
        foreach ($meals ?? [] as $meal) {

            foreach ($instructionTags as $instructionTag) {



                // 1.3: create
                $mealInstruction = new MealInstructionTag();

                $mealInstruction->mealId = $meal->id;
                $mealInstruction->instructionTagId = $instructionTag->id;


                $mealInstruction->save();



            } // end loop - instructionTags




        } // end loop - meals






    } // end function

} // end seeder


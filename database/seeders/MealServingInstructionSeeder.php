<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealServingInstruction;
use App\Models\ServingInstruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealServingInstructionSeeder extends Seeder
{



    public function run() : void
    {


        // 1: dependencies
        $meals = Meal::all();
        $servingInstructions = ServingInstruction::all();





        // 1.2: loop - meals
        foreach ($meals ?? [] as $meal) {

            foreach ($servingInstructions as $servingInstruction) {



                // 1.3: create
                $mealInstruction = new MealServingInstruction();

                $mealInstruction->mealId = $meal->id;
                $mealInstruction->servingInstructionId = $servingInstruction->id;


                $mealInstruction->save();



            } // end loop - servingInstructions




        } // end loop - meals






    } // end function

} // end seeder


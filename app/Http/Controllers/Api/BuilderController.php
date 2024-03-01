<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\MealTag;
use Illuminate\Http\Request;

class BuilderController extends Controller
{




    public function storeBuilder(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $meal = new Meal();

        $meal->type = $request->type;
        $meal->name = $request->name;
        $meal->servingPrice = $request->servingPrice;
        $meal->validity = $request->validity;
        $meal->desc = $request->desc;



        // 1.2: isVegetarian - diet - cuisine
        $meal->isVegetarian = $request->isVegetarian == 1 ? true : false;
        $meal->cuisineId = $request->cuisineId;
        $meal->dietId = $request->dietId;




        // 1.3: imageFiles
        $meal->imageFile = $request->imageFileName;
        $meal->secondImageFile = $request->secondImageFileName;
        $meal->thirdImageFile = $request->thirdImageFileName ?? $request->thirdImageFileName;
        $meal->fourthImageFile = $request->fourthImageFileName ?? $request->fourthImageFileName;





        $meal->save();




        // 2: tags
        foreach ($request->tags as $tag) {


            // 2.1: general
            $mealTag = new MealTag();

            $mealTag->mealId = $meal->id;
            $mealTag->tagId = $tag;

            $mealTag->save();

        } // end loop







        $meal->save();






        return response()->json(['message' => 'Meal has been created'], 200);




    } // end function







} // end controller

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\MealAvailableType;
use App\Models\MealDrink;
use App\Models\MealIngredient;
use App\Models\MealInstruction;
use App\Models\MealPacking;
use App\Models\MealPart;
use App\Models\MealSauce;
use App\Models\MealServing;
use App\Models\MealSide;
use App\Models\MealSize;
use App\Models\MealSnack;
use App\Models\MealSubRecipe;
use App\Models\MealTag;
use Illuminate\Http\Request;

class BuilderController extends Controller
{




    public function storeBuilderGeneral(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $meal = new Meal();

        $meal->typeId = $request->typeId;
        $meal->name = $request->name;
        $meal->servingPrice = doubleval($request->servingPrice);
        $meal->validity = intval($request->validity);
        $meal->desc = $request->desc;



        // 1.2: isVegetarian - diet - cuisine
        $meal->isVegetarian = $request->isVegetarian ? $request->isVegetarian === '1' ? true : false : null;
        $meal->cuisineId = $request->cuisineId;
        $meal->dietId = $request->dietId;




        // 1.3: imageFiles
        $meal->imageFile = $request->imageFileName;
        $meal->secondImageFile = $request->secondImageFileName;
        $meal->thirdImageFile = $request->thirdImageFileName ?? null;
        $meal->fourthImageFile = $request->fourthImageFileName ?? null;





        $meal->save();






        // 2: tags
        foreach ($request->tags as $tag) {


            // 2.1: general
            $mealTag = new MealTag();

            $mealTag->mealId = $meal->id;
            $mealTag->tagId = $tag;

            $mealTag->save();

        } // end loop











        // 3: create mealServing => empty
        $serving = new MealServing();

        $serving->mealId = $meal->id;

        $serving->save();











        return response()->json(['message' => 'Meal has been created', 'id' => $meal->id], 200);




    } // end function









    // -------------------------------------------------------------








    public function updateBuilderGeneral(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: get instance
        $meal = Meal::find($request->id);



        // :: pre-saved
        $previousTypeId = $meal->typeId;







        // 1.2: general
        $meal->typeId = $request->typeId;
        $meal->name = $request->name;
        $meal->servingPrice = doubleval($request->servingPrice);
        $meal->validity = intval($request->validity);
        $meal->desc = $request->desc;



        // 1.2: isVegetarian - diet - cuisine
        $meal->isVegetarian = $request->isVegetarian ? $request->isVegetarian === '1' ? true : false : null;
        $meal->cuisineId = $request->cuisineId;
        $meal->dietId = $request->dietId;




        // 1.3: imageFiles
        $meal->imageFile = $request->imageFileName;
        $meal->secondImageFile = $request->secondImageFileName;
        $meal->thirdImageFile = $request->thirdImageFileName ?? null;
        $meal->fourthImageFile = $request->fourthImageFileName ?? null;




        $meal->save();





        // 2: tags - removePrevious
        MealTag::where('mealId', $meal->id)?->delete();


        if ($request->tags) {

            foreach ($request->tags as $tag) {


                // 2.1: general
                $mealTag = new MealTag();

                $mealTag->mealId = $meal->id;
                $mealTag->tagId = $tag;

                $mealTag->save();

            } // end loop

        } // end if









        // ------------------------------
        // ------------------------------








        // 3: reset partType - sync otherParts
        if ($meal->type->id != $previousTypeId) {


            // :: reset
            $meal->partType = null;



            // :: sync
            MealPart::where('partId', $meal->id)->update([
                'typeId' => $meal->type->id
            ]);


        } // end if










        // 4: reset MealTypes
        if ($meal->type->name != 'Recipe')
            MealAvailableType::where('mealId', $meal->id)?->delete();




        $meal->Save();





        return response()->json(['message' => 'Meal has been updated'], 200);




    } // end function













    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------











    public function updateBuilderMealTypes(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $meal = Meal::find($request->id);



        // :: resetMealTypes - common
        MealAvailableType::where('mealId', $meal->id)->delete();








        // 1.2: recipe
        if ($meal->type->name == 'Recipe') {



            // :: reset partTypes
            $meal->partType = null;




            // :: loop - mealTypes
            foreach ($request->mealTypes as $mealType) {


                // 1.2.1: create
                $type = new MealAvailableType();


                $type->mealId = $meal->id;
                $type->mealTypeId = $mealType;

                $type->save();


            } // end loop








            // 1.2: part
        } else {

            $meal->partType = $request->partType;

        } // end if





        $meal->save();







        return response()->json(['message' => 'Type has been updated', 'id' => $meal->id], 200);




    } // end function













    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------









    public function storeBuilderSize(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: create
        $mealSize = new MealSize();

        $mealSize->mealId = $request->id;
        $mealSize->sizeId = $request->size;


        $mealSize->save();







        // ------------------------
        // ------------------------






        // 2: checkPreviousSizes
        $previousMealSize = MealSize::where('id', '!=', $mealSize->id)
            ->where('mealId', $mealSize->mealId)
            ->first();



        // :: exists
        if ($previousMealSize) {



            // 2.1: ingredients
            foreach ($previousMealSize->ingredients as $previousMealSizeIngredient) {


                // :: create clone
                $mealSizeIngredient = new MealIngredient();

                foreach ($previousMealSizeIngredient->toArray() as $key => $value)
                    $mealSizeIngredient->{$key} = $value;




                // :: mealSizeId
                $mealSizeIngredient->id = null;
                $mealSizeIngredient->mealSizeId = $mealSize->id;
                $mealSizeIngredient->save();



            } // end loop







            // 2.2: parts
            foreach ($previousMealSize->parts as $previousMealSizePart) {


                // :: create clone
                $mealSizePart = new MealPart();

                foreach ($previousMealSizePart->toArray() as $key => $value)
                    $mealSizePart->{$key} = $value;




                // :: mealSizeId
                $mealSizePart->id = null;
                $mealSizePart->mealSizeId = $mealSize->id;
                $mealSizePart->save();



            } // end loop




        } // end if







        return response()->json(['message' => 'Size has been created'], 200);




    } // end function













    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------











    public function updateBuilderContainer(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $meal = Meal::find($request->id);

        $meal->containerId = $request->container;

        $meal->save();





        return response()->json(['message' => 'Container has been updated'], 200);




    } // end function














    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------












    public function storeBuilderInstruction(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: create
        $instruction = new MealInstruction();

        $instruction->mealId = $request->id;
        $instruction->content = $request->instruction;


        $instruction->save();






        return response()->json(['message' => 'Instruction has been created'], 200);




    } // end function











    // -------------------------------------------------------------








    public function updateBuilderInstruction(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $instruction = MealInstruction::find($request->id);

        $instruction->content = $request->instruction;


        $instruction->save();






        return response()->json(['message' => 'Instruction has been updated'], 200);




    } // end function










    // -------------------------------------------------------------









    public function removeBuilderInstruction(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        MealInstruction::find($id)->delete();


        return response()->json(['message' => 'Instruction has been removed'], 200);



    } // end function

















    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------












    public function storeBuilderPacking(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: create
        $packing = new MealPacking();

        $packing->name = $request->name;
        $packing->amount = $request->amount;
        $packing->remarks = $request->remarks;


        // 1.2: meal
        $packing->mealId = $request->mealId;




        $packing->save();






        return response()->json(['message' => 'Packing has been created'], 200);




    } // end function











    // -------------------------------------------------------------








    public function updateBuilderPacking(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $packing = MealPacking::find($request->id);

        $packing->name = $request->name;
        $packing->amount = $request->amount;
        $packing->remarks = $request->remarks;



        $packing->save();






        return response()->json(['message' => 'Packing has been updated'], 200);




    } // end function










    // -------------------------------------------------------------









    public function removeBuilderPacking(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        MealPacking::find($id)->delete();


        return response()->json(['message' => 'Packing has been removed'], 200);



    } // end function












    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------











    public function updateBuilderServing(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $serving = MealServing::find($request->id);

        $serving->desc = $request->desc ?? null;

        $serving->save();






        return response()->json(['message' => 'Serving Details has been updated'], 200);




    } // end function

















    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------










    public function storeBuilderIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;



        // :: getMeal - mealSizes - groupToken
        $meal = Meal::find($request->mealId);
        $groupToken = date('dmYhisA');





        // 1: loop - mealSizes
        foreach ($meal->sizes as $mealSize) {



            // 1.2: create
            $part = null;





            // 1.3: typeId
            if ($request->typeId == 'Ingredient') {


                $part = new MealIngredient();


            } else {

                $part = new MealPart();
                $part->typeId = $request->typeId;

            } // end if








            // 1.4: meal - mealSize - groupToken
            $part->mealId = $meal->id;
            $part->mealSizeId = $mealSize->id;
            $part->groupToken = $groupToken;


            $part->save();



        } // end loop









        return response()->json(['message' => 'Part has been created'], 200);




    } // end function

















    // -------------------------------------------------------------










    public function updateBuilderAfterCookMacros(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;



        // 1: get instance
        $mealSize = MealSize::find($request->mealSizeId);



        $request->macroType == 'Calories' ? $mealSize->afterCookCalories = $request->value : null;
        $request->macroType == 'Proteins' ? $mealSize->afterCookProteins = $request->value : null;
        $request->macroType == 'Carbs' ? $mealSize->afterCookCarbs = $request->value : null;
        $request->macroType == 'Fats' ? $mealSize->afterCookFats = $request->value : null;


        $mealSize->save();






        return response()->json(['message' => 'Macros has been created'], 200);



    } // end function














    // -------------------------------------------------------------








    public function updateBuilderIngredientDetails(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;



        // 1: get instance
        $part = [];




        // 1.2: Ingredient / Part
        $part = $request->typeId == 'Ingredient' ?
            MealIngredient::find($request->id) : MealPart::find($request->id);








        // 1.3: amount - remarks
        $part->amount = $request->amount ?? null;
        $part->remarks = $request->remarks ?? null;
        $part->isRemovable = $request->isRemovable === true ? true : false;




        $part->save();






        return response()->json(['message' => 'Part has been updated'], 200);




    } // end function












    // -------------------------------------------------------------












    public function updateBuilderIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: Ingredient / Part
        if ($request->typeId == 'Ingredient') {



            // :: groupToken otherSizeIngredients
            $groupToken = MealIngredient::find($request->id)->groupToken;


            $parts = MealIngredient::where('groupToken', $groupToken)->get();


            foreach ($parts as $part) {

                $part->ingredientId = $request->partId;
                $part->partType = $request->partType ?? null;

                $part->save();

            } // end loop








        } else {


            // :: groupToken otherSizeIngredients
            $groupToken = MealPart::find($request->id)->groupToken;


            $parts = MealPart::where('groupToken', $groupToken)->get();

            foreach ($parts as $part) {

                $part->partId = $request->partId;
                $part->partType = $request->partType ?? null;

                $part->save();

            } // end loop


        } // end if










        return response()->json(['message' => 'Part has been updated'], 200);




    } // end function





















    // -------------------------------------------------------------












    public function removeBuilderIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: Ingredient / Part
        if ($request->typeId == 'Ingredient') {


            // :: groupToken otherSizeIngredients
            $groupToken = MealIngredient::find($request->id)->groupToken;


            MealIngredient::where('groupToken', $groupToken)->delete();



        } else {


            // :: groupToken otherSizeIngredients
            $groupToken = MealPart::find($request->id)->groupToken;

            MealPart::where('groupToken', $groupToken)->delete();



        } // end if










        return response()->json(['message' => 'Part has been remove'], 200);



    } // end function












} // end controller

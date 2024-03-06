<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\MealAvailableType;
use App\Models\MealDrink;
use App\Models\MealIngredient;
use App\Models\MealInstruction;
use App\Models\MealPacking;
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

        $meal->type = $request->type;
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
        $previousType = $meal->type;







        // 1.2: general
        $meal->type = $request->type;
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











        // 3: reset itemType / mealTypes if changed
        if ($meal->type != $previousType)
            $meal->itemType = null;


        if ($meal->type != 'Meal')
            MealAvailableType::where('mealId', $meal->id)?->delete();



        $meal->save();







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








        // 1.2: meal
        if ($meal->type == 'Meal') {



            // :: reset itemTypes
            $meal->itemType = null;




            // :: loop - mealTypes
            foreach ($request->mealTypes as $mealType) {


                // 1.2.1: create
                $type = new MealAvailableType();


                $type->mealId = $meal->id;
                $type->mealTypeId = $mealType;

                $type->save();


            } // end loop








            // 1.2: item
        } else {

            $meal->itemType = $request->itemType;

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
        // $previousMealSize = MealSize::where('id', '!=', $mealSize->id)->first();

        // if ($previousMealSize) {



        //     // 2.1: ingredients
        //     foreach ($previousMealSize->ingredients as $previousMealSizeIngredient) {


        //         $mealSizeIngredient = new MealIngredient();

        //         $mealSizeIngredient->mealId = $previousMealSizeIngredient->mealId;

        //     } // end loop



        // } // end if







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
            $item = null;





            // 1.3: itemType - Ingredient / Sub-recipe / Snack / Sauce / Side / Drink
            $request->type == 'Ingredient' ? $item = new MealIngredient() : null;
            $request->type == 'Sub-recipe' ? $item = new MealSubRecipe() : null;
            $request->type == 'Snack' ? $item = new MealSnack() : null;
            $request->type == 'Sauce' ? $item = new MealSauce() : null;
            $request->type == 'Side' ? $item = new MealSide() : null;
            $request->type == 'Drink' ? $item = new MealDrink() : null;





            // 1.4: meal - mealSize - groupToken
            $item->mealId = $meal->id;
            $item->mealSizeId = $mealSize->id;
            $item->groupToken = $groupToken;


            $item->save();


        } // end loop









        return response()->json(['message' => $meal->type . ' ' . $request->type . ' has been created'], 200);




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
        $item = [];




        // 1.2: type - Ingredient / Sub-recipe / Snack / Sauce / Side / Drink
        $request->type == 'Ingredient' ? $item = MealIngredient::find($request->id) : null;
        $request->type == 'Sub-recipe' ? $item = MealSubRecipe::find($request->id) : null;
        $request->type == 'Snack' ? $item = MealSnack::find($request->id) : null;
        $request->type == 'Sauce' ? $item = MealSauce::find($request->id) : null;
        $request->type == 'Side' ? $item = MealSide::find($request->id) : null;
        $request->type == 'Drink' ? $item = MealDrink::find($request->id) : null;








        // 1.3: amount - remarks
        $item->amount = $request->amount ?? null;
        $item->remarks = $request->remarks ?? null;
        $item->isRemovable = $request->isRemovable === true ? true : false;
        $item->type = $request->itemType ?? null;




        $item->save();






        return response()->json(['message' => $request->type . ' has been updated'], 200);




    } // end function












    // -------------------------------------------------------------












    public function updateBuilderIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: type - Ingredient
        if ($request->type == 'Ingredient') {


            // :: previousIngredient
            $groupToken = MealIngredient::find($request->id)->groupToken;


            $items = MealIngredient::where('groupToken', $groupToken)->get();


            foreach ($items as $item) {

                $item->ingredientId = $request->itemId;
                $item->type = $request->itemType ?? null;

                $item->save();

            } // end loop



        } // end if






        // 1.2: type - subRecipe
        if ($request->type == 'Sub-recipe') {


            // :: previousIngredient
            $groupToken = MealSubRecipe::find($request->id)->groupToken;


            $items = MealSubRecipe::where('groupToken', $groupToken)->get();

            foreach ($items as $item) {

                $item->subRecipeId = $request->itemId;
                $item->type = $request->itemType ?? null;

                $item->save();

            } // end loop


        } // end if







        // 1.3: type - snack
        if ($request->type == 'Snack') {


            // :: previousIngredient
            $groupToken = MealSnack::find($request->id)->groupToken;


            $items = MealSnack::where('groupToken', $groupToken)->get();

            foreach ($items as $item) {

                $item->snackId = $request->itemId;
                $item->type = $request->itemType ?? null;

                $item->save();

            } // end loop



        } // end if







        // 1.4: type - sauce
        if ($request->type == 'Sauce') {

            // :: previousIngredient
            $groupToken = MealSauce::find($request->id)->groupToken;


            $items = MealSauce::where('groupToken', $groupToken)->get();

            foreach ($items as $item) {

                $item->sauceId = $request->itemId;
                $item->type = $request->itemType ?? null;

                $item->save();

            } // end loop



        } // end if





        // 1.5: type - side
        if ($request->type == 'Side') {


            // :: previousIngredient
            $groupToken = MealSide::find($request->id)->groupToken;


            $items = MealSide::where('groupToken', $groupToken)->get();

            foreach ($items as $item) {

                $item->sideId = $request->itemId;
                $item->type = $request->itemType ?? null;


                $item->save();

            } // end loop


        } // end if





        // 1.6: type - drink
        if ($request->type == 'Drink') {



            // :: previousIngredient
            $groupToken = MealDrink::find($request->id)->groupToken;


            $items = MealDrink::where('groupToken', $groupToken)->get();

            foreach ($items as $item) {

                $item->drinkId = $request->itemId;
                $item->type = $request->itemType ?? null;

                $item->save();

            } // end loop



        } // end if








        return response()->json(['message' => $request->type . ' has been updated'], 200);




    } // end function


















} // end controller

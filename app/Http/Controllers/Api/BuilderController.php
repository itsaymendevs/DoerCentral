<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\MealAvailableType;
use App\Models\MealIngredient;
use App\Models\MealInstruction;
use App\Models\MealPacking;
use App\Models\MealPart;
use App\Models\MealServing;
use App\Models\MealServingInstruction;
use App\Models\MealSize;
use App\Models\MealTag;
use App\Models\ServingInstruction;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class BuilderController extends Controller
{



    use HelperTrait;




    public function storeBuilderGeneral(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $meal = new Meal();

        $meal->typeId = $request->typeId;
        $meal->name = $request->name;
        $meal->nameURL = $this->getNameURL($request->name);
        $meal->servingPrice = doubleval($request->servingPrice ?? 0);
        $meal->validity = intval($request->validity);
        $meal->desc = $request->desc;



        // 1.2: category - diet - cuisine
        $meal->category = $request->category ?? null;
        $meal->cuisineId = $request->cuisineId;
        $meal->dietId = $request->dietId;




        // 1.3: imageFiles
        $meal->imageFile = $request->imageFileName ?? null;
        $meal->secondImageFile = $request->secondImageFileName ?? null;
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












        // 4: servingInstructions
        $servingInstructions = ServingInstruction::all();


        foreach ($servingInstructions ?? [] as $servingInstruction) {


            // 2.1: general
            $mealServingInstruction = new MealServingInstruction();

            $mealServingInstruction->mealId = $meal->id;
            $mealServingInstruction->servingInstructionId = $servingInstruction->id;

            $mealServingInstruction->save();

        } // end loop









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
        $meal->nameURL = $this->getNameURL($request->name);
        $meal->servingPrice = doubleval($request->servingPrice ?? 0);
        $meal->validity = intval($request->validity);
        $meal->desc = $request->desc;



        // 1.2: category - diet - cuisine
        $meal->category = $request->category ?? null;
        $meal->cuisineId = $request->cuisineId;
        $meal->dietId = $request->dietId;




        // 1.3: imageFiles
        $meal->imageFile = $request->imageFileName ?? null;
        $meal->secondImageFile = $request->secondImageFileName ?? null;
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









        // --------------------------------------------
        // --------------------------------------------









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









    public function updateBuilderSizePrice(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $mealSize = MealSize::find($request->id);

        $mealSize->price = $request?->price ?? null;
        $mealSize->save();





        return response()->json(['message' => 'Price has been updated'], 200);




    } // end function















    // -------------------------------------------------------------









    public function updateBuilderSizeServings(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $mealSize = MealSize::find($request->id);

        $mealSize->{$request->key} = $request?->value ?? null;
        $mealSize->save();





        return response()->json(['message' => 'Information has been updated'], 200);




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

        $meal->containerId = $request->container ?? null;

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













    public function updateBuilderLabel(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $meal = Meal::find($request->id);

        $meal->labelId = $request->label;

        $meal->save();





        return response()->json(['message' => 'Label has been updated'], 200);




    } // end function












    // -------------------------------------------------------------











    public function toggleBuilderServingInstruction(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $servingInstruction = MealServingInstruction::find($request->id);

        $servingInstruction->isActive = ! boolval($servingInstruction->isActive);

        $servingInstruction->save();




        return response()->json(['message' => 'Status has been updated'], 200);




    } // end function





















    // -------------------------------------------------------------











    public function toggleBuilderCutlery(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: get instance
        $serving = MealServing::find($request->id);

        $serving->useCutlery = boolval($request->useCutlery);

        $serving->save();





        return response()->json(['message' => 'Serving Details has been updated'], 200);




    } // end function















    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
    // -------------------------------------------------------------
















    public function updateBuilderIngredients(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: dependencies
        $meal = Meal::find($request->mealId[0]);



        // 1.2: removePrevious
        MealIngredient::where('mealId', $meal->id)->delete();
        MealPart::where('mealId', $meal->id)->delete();








        // -----------------------------------------
        // -----------------------------------------






        // 2: loop - items
        for ($i = 0; $i < count($request?->type ?? []); $i++) {





            if ($request->isRemoved[$i] == false) {




                // 2.1: create instance
                if ($request->type[$i] == 'Ingredient') {


                    $part = new MealIngredient();
                    $part->ingredientId = $request->partId[$i];
                    $part->ingredientBrandId = $request->partBrandId[$i] ?? null;




                } else {

                    $part = new MealPart();
                    $part->partId = $request->partId[$i];
                    $part->typeId = $request->typeId[$i];


                } // end if





                // 2.2: partType - cookingType
                $part->partType = $request->partType[$i] ?? null;
                $request->partType[$i] == 'Main' ? $part->cookingTypeId = $request->cookingTypeId[$i] ?? null : null;






                // 2.3: brand - meal - mealSize - groupToken
                $part->mealId = $request->mealId[$i];
                $part->mealSizeId = $request->mealSizeId[$i];
                $part->groupToken = $request->groupToken[$i];








                // 2.4: amount
                $part->amount = $request->grams[$i] ?? null;
                $part->remarks = $request->remarks[$i] ?? null;





                // 2.5: default - removable
                $part->isDefault = $request->isDefault[$i] ?? null;
                $part->isRemovable = $request->isRemovable[$i] ?? null;







                $part->save();




            } // end if - isRemoved

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


        $request->macroType == 'Grams' ? $mealSize->afterCookGrams = $request->value : null;
        $request->macroType == 'Calories' ? $mealSize->afterCookCalories = $request->value : null;
        $request->macroType == 'Proteins' ? $mealSize->afterCookProteins = $request->value : null;
        $request->macroType == 'Carbs' ? $mealSize->afterCookCarbs = $request->value : null;
        $request->macroType == 'Fats' ? $mealSize->afterCookFats = $request->value : null;
        $request->macroType == 'Cost' ? $mealSize->afterCookCost = $request->value : null;


        $mealSize->save();






        return response()->json(['message' => 'Macros has been created'], 200);



    } // end function












} // end controller

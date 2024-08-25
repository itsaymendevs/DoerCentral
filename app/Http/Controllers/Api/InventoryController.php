<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\IngredientMacro;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class InventoryController extends Controller
{


    use HelperTrait;




    public function storeIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $ingredient = new Ingredient();



        // 1.2: basic
        $ingredient->name = $request->name;
        $ingredient->desc = $request->desc;
        $ingredient->usage = $request->usage;
        $ingredient->referenceID = $request->referenceID;

        $ingredient->increment = $request->increment;
        $ingredient->decrement = $request->decrement;
        $ingredient->wastage = $request->wastage;




        // 1.3: imageFile
        $ingredient->imageFile = $request->imageFileName;



        // 1.4: units
        $ingredient->unitId = $request->unitId;
        $ingredient->purchaseUnitId = $request->purchaseUnitId;







        $ingredient->save();









        // -----------------------------------
        // -----------------------------------








        // 2: create Macro - Fresh
        $ingredientMacro = new IngredientMacro();


        // 1.2: general
        $ingredientMacro->ingredientType = 'Fresh';
        $ingredientMacro->ingredientId = $ingredient->id;




        $ingredientMacro->save();





        return response()->json(['message' => 'Ingredient has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updateIngredient(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $ingredient = Ingredient::find($request->id);




        // 1.2: basic
        $ingredient->name = $request->name;
        $ingredient->desc = $request->desc;
        $ingredient->usage = $request->usage;
        $ingredient->referenceID = $request->referenceID;

        $ingredient->increment = $request->increment;
        $ingredient->decrement = $request->decrement;
        $ingredient->wastage = $request->wastage;




        // 1.3: imageFile
        $ingredient->imageFile = $request->imageFileName ?? null;



        // 1.4: units
        $ingredient->unitId = $request->unitId;
        $ingredient->purchaseUnitId = $request->purchaseUnitId;





        $ingredient->save();






        return response()->json(['message' => 'Ingredient has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Ingredient::find($id)->delete();


        return response()->json(['message' => 'Ingredient has been removed'], 200);



    } // end function










} // end controller

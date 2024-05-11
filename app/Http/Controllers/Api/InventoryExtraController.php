<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\ConversionIngredient;
use App\Models\CookingType;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class InventoryExtraController extends Controller
{


    use HelperTrait;



    public function storeConversion(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $conversion = new Conversion();

        $conversion->name = $request->name;
        $conversion->save();





        return response()->json(['message' => 'Conversion has been created'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------













    public function updateConversion(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $conversion = Conversion::find($request->id);

        $conversion->name = $request->name;
        $conversion->save();





        return response()->json(['message' => 'Conversion has been updated'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeConversion(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Conversion::find($id)->delete();


        return response()->json(['message' => 'Conversion has been removed'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storeConversionIngredient(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: create ingredient


        // 1.2: cookingTypes
        $cookingTypes = CookingType::all();

        foreach ($cookingTypes as $cookingType) {


            // 1: create ingredient
            $conversionIngredient = new ConversionIngredient();

            $conversionIngredient->cookingTypeId = $cookingType->id;
            $conversionIngredient->conversionId = $request->id;

            $conversionIngredient->groupToken = $this->makeGroupToken();

            $conversionIngredient->save();


        } // end loop








        return response()->json(['message' => 'Ingredient has been assigned'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------












    public function updateConversionIngredient(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: loop - ingredientsByToken
        foreach ($request?->ingredients ?? [] as $commonToken => $ingredientsByToken) {




            // :: updateIngredient
            ConversionIngredient::where('groupToken', $commonToken)->update([
                'ingredientId' => $ingredientsByToken->{'ingredientId'}
            ]);







            // 1.2: loop - ingredients
            foreach ($ingredientsByToken as $cookingTypeId => $conversionValue) {


                // 1.3: get instance
                $conversionIngredient = ConversionIngredient::where('groupToken', $commonToken)
                    ->where('cookingTypeId', $cookingTypeId)->latest()->first();



                // :: exists - update
                if ($conversionIngredient) {

                    $conversionIngredient->conversionValue = $conversionValue;
                    $conversionIngredient->save();

                } // end if





            } // end loop



        } // end loop








        return response()->json(['message' => 'Ingredients has been updated'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------







    public function removeConversionIngredient(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $groupToken = $request->instance;





        // 1: remove - byToken
        ConversionIngredient::where('groupToken', $groupToken)->delete();








        return response()->json(['message' => 'Ingredient has been removed'], 200);



    } // end function






} // end controller

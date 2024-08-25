<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\ConversionIngredient;
use App\Models\Ingredient;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use stdClass;

class SyncController extends Controller
{


    use HelperTrait;




    public function syncInventory(Request $request)
    {



        // 1: get instance
        $ingredients = Ingredient::all();
        $conversion = Conversion::all();
        $conversionIngredients = ConversionIngredient::all();





        // 1.2: response
        $response = new stdClass();


        $response->ingredients = $ingredients;
        $response->conversion = $conversion;
        $response->conversionIngredients = $conversionIngredients;


        return response()->json($response, 200);





    } // end function











    // --------------------------------------------------------------------------------------------









} // end controller

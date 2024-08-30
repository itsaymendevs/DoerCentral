<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientLead;
use App\Models\Conversion;
use App\Models\ConversionIngredient;
use App\Models\Ingredient;
use App\Models\IngredientMacro;
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
        $ingredientsMacro = IngredientMacro::all();

        $conversions = Conversion::all();
        $conversionIngredients = ConversionIngredient::all();






        // 1.2: response
        $response = new stdClass();


        $response->ingredients = $ingredients;
        $response->ingredientsMacro = $ingredientsMacro;

        $response->conversions = $conversions;
        $response->conversionIngredients = $conversionIngredients;


        return response()->json($response, 200);




    } // end function











    // --------------------------------------------------------------------------------------------






    public function syncProfile(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;



        // 1: getBrand
        $brand = ClientLead::where('name', 'LIKE', '%' . $request->name . '%')?->first();


        // 1.2: response
        $response = new stdClass();

        if ($brand) {

            $response->name = $brand->name;
            $response->email = $brand->email;
            $response->phone = "{$brand->phoneKey} {$brand->phone}";
            $response->websiteURL = $brand->websiteURL;
            $response->locationAddress = $brand->address;

            $response->websiteURL = $brand->websiteURL;
            $response->clientURL = "{$brand->websiteURL}/doer/public";
            $response->serverURL = "{$brand->websiteURL}/doer-server/public";
            $response->plansURL = "{$brand->websiteURL}/plans";
            $response->renewURL = "{$brand->websiteURL}/plans/{token}";
            $response->applicationURL = "{$brand->websiteURL}/doer/public/portals/customer";



        } // end if





        return response()->json($response, 200);




    } // end function









} // end controller

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\ConversionIngredient;
use App\Models\CookingType;
use App\Models\IngredientMacro;
use App\Models\StockPurchase;
use App\Models\StockPurchaseIngredient;
use App\Models\SupplierIngredient;
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












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------















    public function storeIngredientBrand(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $macro = new IngredientMacro();




        // 1.2: general
        $macro->brand = $request->brand;
        $macro->ingredientType = 'Fresh';





        // 1.3: macros
        $macro->calories = ($request->calories ?? 0) / 100;
        $macro->proteins = ($request->proteins ?? 0) / 100;
        $macro->carbs = ($request->carbs ?? 0) / 100;
        $macro->fats = ($request->fats ?? 0) / 100;
        $macro->cholesterol = ($request->cholesterol ?? 0) / 100;
        $macro->sodium = ($request->sodium ?? 0) / 100;
        $macro->fiber = ($request->fiber ?? 0) / 100;
        $macro->sugar = ($request->sugar ?? 0) / 100;
        $macro->calcium = ($request->calcium ?? 0) / 100;
        $macro->iron = ($request->iron ?? 0) / 100;
        $macro->vitaminA = ($request->vitaminA ?? 0) / 100;
        $macro->vitaminC = ($request->vitaminC ?? 0) / 100;






        // 1.4: ingredient
        $macro->ingredientId = $request->ingredientId;

        $macro->save();






        return response()->json(['message' => 'Brand has been created'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------














    public function updateIngredientBrand(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $macro = IngredientMacro::find($request->id);




        // 1.2: general
        $macro->brand = $request->brand;




        // 1.3: macros
        $macro->calories = ($request->calories ?? 0) / 100;
        $macro->proteins = ($request->proteins ?? 0) / 100;
        $macro->carbs = ($request->carbs ?? 0) / 100;
        $macro->fats = ($request->fats ?? 0) / 100;
        $macro->cholesterol = ($request->cholesterol ?? 0) / 100;
        $macro->sodium = ($request->sodium ?? 0) / 100;
        $macro->fiber = ($request->fiber ?? 0) / 100;
        $macro->sugar = ($request->sugar ?? 0) / 100;
        $macro->calcium = ($request->calcium ?? 0) / 100;
        $macro->iron = ($request->iron ?? 0) / 100;
        $macro->vitaminA = ($request->vitaminA ?? 0) / 100;
        $macro->vitaminC = ($request->vitaminC ?? 0) / 100;




        $macro->save();






        return response()->json(['message' => 'Brand has been updated'], 200);



    } // end function









    // --------------------------------------------------------------------------------------------





    public function removeIngredientBrand(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        IngredientMacro::find($id)->delete();


        return response()->json(['message' => 'Brand has been removed'], 200);



    } // end function





















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storePurchaseOrder(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: loop - purchases
        $purchaseOrders = collect($request->purchaseOrders);

        foreach ($purchaseOrders?->groupBy('supplierId') as $commonSupplier => $purchaseOrdersBySupplier) {




            // 1.2: create
            $purchase = new StockPurchase();



            // 1.3: basic
            $purchase->PONumber = $this->makeSerial('PO', StockPurchase::count() + 1);
            $purchase->supplierId = $commonSupplier;
            $purchase->receivingDate = $request?->receivingDate ?? null;


            $purchase->save();








            // ---------------------------------------------------
            // ---------------------------------------------------





            // 2: purchase ingredients
            foreach ($purchaseOrdersBySupplier ?? [] as $purchaseOrder) {



                // 2.1: dependencies
                $supplierIngredient = SupplierIngredient::where('supplierId', $purchase->supplierId)
                    ->where('ingredientId', $purchaseOrder->ingredientId)->first();






                // 2.3: create
                $purchaseIngredient = new StockPurchaseIngredient();




                // 2.4: basic
                $purchaseIngredient->ingredientId = $purchaseOrder->ingredientId;
                $purchaseIngredient->quantity = doubleval($purchaseOrder->quantity);
                $purchaseIngredient->includeWastage = boolval($purchaseOrder->wastage ?? false);
                $purchaseIngredient->remarks = $purchaseOrder->remarks ?? null;



                // 2.5: stockPurchase - buyPrice - unit
                $purchaseIngredient->stockPurchaseId = $purchase->id;
                $purchaseIngredient->buyPrice = $supplierIngredient->sellPrice;
                $purchaseIngredient->unitId = $supplierIngredient->unitId;



                $purchaseIngredient->save();



            } // end loop - purchaseOrders



        } // end loop - groupBySupplier










        return response()->json(['message' => 'Purchases has been created'], 200);




    } // end function











} // end controller

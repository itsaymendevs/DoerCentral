<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use App\Models\StockPurchase;
use App\Models\StockPurchaseIngredient;
use App\Models\Supplier;
use App\Models\SupplierIngredient;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class InventoryController extends Controller
{


    use HelperTrait;






    public function storeCategory(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $category = new IngredientCategory();

        $category->name = $request->name;
        $category->desc = $request->desc;


        $category->save();






        return response()->json(['message' => 'Category has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updateCategory(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $category = IngredientCategory::find($request->id);

        $category->name = $request->name;
        $category->desc = $request->desc;


        $category->save();






        return response()->json(['message' => 'Category has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeCategory(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        IngredientCategory::find($id)->delete();


        return response()->json(['message' => 'Category has been removed'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeGroup(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $group = new IngredientGroup();

        $group->name = $request->name;
        $group->desc = $request->desc;


        $group->save();






        return response()->json(['message' => 'Group has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updateGroup(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $group = IngredientGroup::find($request->id);

        $group->name = $request->name;
        $group->desc = $request->desc;


        $group->save();






        return response()->json(['message' => 'Group has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeGroup(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        IngredientGroup::find($id)->delete();


        return response()->json(['message' => 'Group has been removed'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeExclude(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $exclude = new Exclude();

        $exclude->name = $request->name;
        $exclude->desc = $request->desc;


        $exclude->save();






        return response()->json(['message' => 'Exclude has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updateExclude(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $exclude = Exclude::find($request->id);

        $exclude->name = $request->name;
        $exclude->desc = $request->desc;


        $exclude->save();






        return response()->json(['message' => 'Exclude has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeExclude(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Exclude::find($id)->delete();


        return response()->json(['message' => 'Exclude has been removed'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------

















    public function storeAllergy(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $allergy = new Allergy();

        $allergy->name = $request->name;
        $allergy->desc = $request->desc;


        $allergy->save();






        return response()->json(['message' => 'Allergy has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updateAllergy(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $allergy = Allergy::find($request->id);

        $allergy->name = $request->name;
        $allergy->desc = $request->desc;


        $allergy->save();






        return response()->json(['message' => 'Allergy has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeAllergy(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Allergy::find($id)->delete();


        return response()->json(['message' => 'Allergy has been removed'], 200);



    } // end function



















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










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




        // 1.5: group - category - exclude - allergy
        $ingredient->groupId = $request->groupId;
        $ingredient->categoryId = $request->categoryId;

        $ingredient->excludeId = $request->excludeId ?? null;
        $ingredient->allergyId = $request->allergyId ?? null;



        $ingredient->save();






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




        // 1.5: group - category - exclude - allergy
        $ingredient->groupId = $request->groupId;
        $ingredient->categoryId = $request->categoryId;

        $ingredient->excludeId = $request->excludeId ?? null;
        $ingredient->allergyId = $request->allergyId ?? null;



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















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storeSupplier(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $supplier = new Supplier();



        // 1.2: basic
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;




        $supplier->save();






        return response()->json(['message' => 'Supplier has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updateSupplier(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $supplier = Supplier::find($request->id);




        // 1.2: basic
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;




        $supplier->save();








        return response()->json(['message' => 'Supplier has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeSupplier(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Supplier::find($id)->delete();


        return response()->json(['message' => 'Supplier has been removed'], 200);



    } // end function




















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storeSupplierIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $supplierIngredient = new SupplierIngredient();



        // 1.2: basic
        $supplierIngredient->ingredientId = $request->ingredientId;
        $supplierIngredient->supplierId = $request->supplierId;
        $supplierIngredient->unitId = $request->unitId;
        $supplierIngredient->sellPrice = $request->sellPrice;




        $supplierIngredient->save();






        return response()->json(['message' => 'Ingredient has been appended'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updateSupplierIngredient(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $supplierIngredient = SupplierIngredient::find($request->id);



        // 1.2: basic
        $supplierIngredient->ingredientId = $request->ingredientId;
        $supplierIngredient->supplierId = $request->supplierId;
        $supplierIngredient->unitId = $request->unitId;
        $supplierIngredient->sellPrice = $request->sellPrice;



        $supplierIngredient->save();








        return response()->json(['message' => 'Ingredient has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeSupplierIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        SupplierIngredient::find($id)->delete();


        return response()->json(['message' => 'Ingredient has been removed'], 200);



    } // end function























    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storePurchase(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $purchase = new StockPurchase();



        // 1.2: basic
        $purchase->receivingDate = $request->receivingDate;
        $purchase->purchaseID = $request->purchaseID;
        $purchase->PONumber = $this->makeSerial('PO', StockPurchase::count() + 1);
        $purchase->remarks = $request->remarks;

        $purchase->supplierId = $request->supplierId;


        $purchase->save();






        return response()->json(['message' => 'Purchase has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updatePurchase(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $purchase = StockPurchase::find($request->id);


        // :: savePrevious
        $previousSupplier = $purchase->supplierId;




        // 1.2: basic
        $purchase->receivingDate = $request->receivingDate;
        $purchase->purchaseID = $request->purchaseID;
        $purchase->remarks = $request->remarks;

        $purchase->supplierId = $request->supplierId;


        $purchase->save();









        // ! 2: remove purchaseIngredients
        if ($previousSupplier != $request->supplierId) {

            StockPurchaseIngredient::where('stockPurchaseId', $purchase->id)->delete();

        } // end if







        return response()->json(['message' => 'Purchase has been updated'], 200);





    } // end function












    // --------------------------------------------------------------------------------------------








    public function confirmPurchase(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        $purchase = StockPurchase::find($id);

        $purchase->isConfirmed = true;


        $purchase->save();






        return response()->json(['message' => 'Purchase has been confirmed'], 200);





    } // end function






    // --------------------------------------------------------------------------------------------





    public function removePurchase(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        StockPurchase::find($id)->delete();


        return response()->json(['message' => 'Purchase has been removed'], 200);



    } // end function


















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storePurchaseIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;


        // :: dependencies
        $purchase = StockPurchase::find($request->stockPurchaseId);
        $supplierIngredient = SupplierIngredient::where('supplierId', $purchase->supplierId)
            ->where('ingredientId', $request->ingredientId)->first();








        // 1: create
        $purchaseIngredient = new StockPurchaseIngredient();




        // 1.2: basic
        $purchaseIngredient->ingredientId = $request->ingredientId;
        $purchaseIngredient->quantity = doubleval($request->quantity);


        // 1.3: stockPurchase - buyPrice - unit
        $purchaseIngredient->stockPurchaseId = $purchase->id;
        $purchaseIngredient->buyPrice = $supplierIngredient->sellPrice;
        $purchaseIngredient->unitId = $supplierIngredient->unitId;



        $purchaseIngredient->save();






        return response()->json(['message' => 'Purchase Ingredient has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------








    public function updatePurchaseIngredient(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $purchaseIngredient = StockPurchaseIngredient::find($request->id);



        // 1.2: basic
        $purchaseIngredient->quantity = doubleval($request->quantity);


        $purchaseIngredient->save();







        return response()->json(['message' => 'Purchase Ingredient has been updated'], 200);




    } // end function












    // --------------------------------------------------------------------------------------------





    public function removePurchaseIngredient(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        StockPurchaseIngredient::find($id)->delete();


        return response()->json(['message' => 'Purchase Ingredient has been removed'], 200);



    } // end function







} // end controller

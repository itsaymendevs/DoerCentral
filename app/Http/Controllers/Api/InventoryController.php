<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use Illuminate\Http\Request;

class InventoryController extends Controller
{





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













} // end controller

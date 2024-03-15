<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use App\Models\Diet;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Http\Request;

class MenuSettingController extends Controller
{



    public function storeDiet(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $diet = new Diet();

        $diet->name = $request->name;
        $diet->desc = $request->desc;

        $diet->proteins = $request->proteins;
        $diet->carbs = $request->carbs;
        $diet->fats = $request->fats;


        $diet->save();





        return response()->json(['message' => 'Diet has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateDiet(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $diet = Diet::find($request->id);

        $diet->name = $request->name;
        $diet->desc = $request->desc;


        $diet->proteins = $request->proteins;
        $diet->carbs = $request->carbs;
        $diet->fats = $request->fats;


        $diet->save();







        return response()->json(['message' => 'Diet has been updated'], 200);





    } // end function












    // --------------------------------------------------------------------------------------------




    public function removeDiet(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Diet::find($id)->delete();


        return response()->json(['message' => 'Diet has been removed'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------














    public function storeSize(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $diet = new Size();

        $diet->name = $request->name;
        $diet->price = $request->price;

        $diet->calories = $request->calories;

        $diet->save();





        return response()->json(['message' => 'Size has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateSize(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $diet = Size::find($request->id);

        $diet->name = $request->name;
        $diet->price = $request->price;

        $diet->calories = $request->calories;

        $diet->save();







        return response()->json(['message' => 'Size has been updated'], 200);





    } // end function












    // --------------------------------------------------------------------------------------------




    public function removeSize(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Size::find($id)->delete();


        return response()->json(['message' => 'Size has been removed'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storeTag(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $tag = new Tag();

        $tag->name = $request->name;
        $tag->imageFile = $request->imageFileName ?? null;


        $tag->save();





        return response()->json(['message' => 'Tag has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateTag(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $tag = Tag::find($request->id);

        $tag->name = $request->name;
        $tag->imageFile = $request->imageFileName ?? null;


        $tag->save();







        return response()->json(['message' => 'Tag has been updated'], 200);





    } // end function












    // --------------------------------------------------------------------------------------------




    public function removeTag(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Tag::find($id)->delete();


        return response()->json(['message' => 'Tag has been removed'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeCuisine(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $cuisine = new Cuisine();

        $cuisine->name = $request->name;


        $cuisine->save();





        return response()->json(['message' => 'Cuisine has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateCuisine(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $cuisine = Cuisine::find($request->id);

        $cuisine->name = $request->name;


        $cuisine->save();







        return response()->json(['message' => 'Cuisine has been updated'], 200);





    } // end function












    // --------------------------------------------------------------------------------------------




    public function removeCuisine(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Cuisine::find($id)->delete();


        return response()->json(['message' => 'Cuisine has been removed'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------









} // end controller




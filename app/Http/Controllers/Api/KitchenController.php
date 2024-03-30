<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Label;
use Illuminate\Http\Request;

class KitchenController extends Controller
{






    public function storeContainer(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $container = new Container();


        // 1.2: general
        $container->name = $request->name;
        $container->charge = $request->charge;


        $container->imageFile = $request->imageFileName ?? null;


        $container->save();






        return response()->json(['message' => 'Container has been created'], 200);




    } // end function










    // --------------------------------------------------------------------------------------------











    public function updateContainerCharge(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $container = Container::find($request->id);


        // 1.2: general
        $container->charge = $request->charge;


        $container->save();






        return response()->json(['message' => 'Charge has been updated'], 200);




    } // end function













    // --------------------------------------------------------------------------------------------









    public function removeContainer(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Container::find($id)->delete();


        return response()->json(['message' => 'Container has been removed'], 200);



    } // end function









    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------









    public function removeLabel(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Label::find($id)->delete();


        return response()->json(['message' => 'Label has been removed'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------







} // end controller

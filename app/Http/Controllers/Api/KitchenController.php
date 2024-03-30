<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Label;
use App\Models\LabelContainer;
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











    public function storeLabel(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $label = new Label();


        // 1.2: general
        $label->name = $request->name;
        $label->charge = $request->charge;

        $label->width = $request->width;
        $label->height = $request->height;
        $label->desc = $request->desc ?? null;
        $label->radius = $request->radius ?? 0;





        // 1.3: colors
        $label->backgroundColor = $request->backgroundColor;
        $label->fontColor = $request->fontColor;
        $label->labelBackgroundColor = $request->labelBackgroundColor;





        // 1.4: showOptions
        $label->showQRCode = boolval($request->showQRCode) ?? false;
        $label->showPrice = boolval($request->showPrice) ?? false;
        $label->showAllergy = boolval($request->showAllergy) ?? false;
        $label->showMealRemarks = boolval($request->showMealRemarks) ?? false;
        $label->showCustomerName = boolval($request->showCustomerName) ?? false;
        $label->showProductionDate = boolval($request->showProductionDate) ?? false;
        $label->showServingInstructions = boolval($request->showServingInstructions) ?? false;




        // 1.5: imageFile
        $label->imageFile = $request->imageFileName ?? null;


        $label->save();







        // ----------------------------------------
        // ----------------------------------------







        // 2: containers
        foreach ($request->containers ?? [] as $container) {



            // 2.1: create
            $labelContainer = new LabelContainer();


            $labelContainer->containerId = $container;
            $labelContainer->labelId = $label->id;


            $labelContainer->save();


        } // end loop









        return response()->json(['message' => 'Label has been created'], 200);




    } // end function










    // --------------------------------------------------------------------------------------------













    public function updateLabel(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $label = Label::find($request->id);



        // 1.2: general
        $label->name = $request->name;
        $label->charge = $request->charge;

        $label->width = $request->width;
        $label->height = $request->height;
        $label->desc = $request->desc ?? null;
        $label->radius = $request->radius ?? 0;





        // 1.3: colors
        $label->backgroundColor = $request->backgroundColor;
        $label->fontColor = $request->fontColor;
        $label->labelBackgroundColor = $request->labelBackgroundColor;





        // 1.4: showOptions
        $label->showQRCode = boolval($request->showQRCode) ?? false;
        $label->showPrice = boolval($request->showPrice) ?? false;
        $label->showAllergy = boolval($request->showAllergy) ?? false;
        $label->showMealRemarks = boolval($request->showMealRemarks) ?? false;
        $label->showCustomerName = boolval($request->showCustomerName) ?? false;
        $label->showProductionDate = boolval($request->showProductionDate) ?? false;
        $label->showServingInstructions = boolval($request->showServingInstructions) ?? false;




        // 1.5: imageFile
        $label->imageFile = $request->imageFileName ?? null;


        $label->save();







        // ----------------------------------------
        // ----------------------------------------







        // 2: containers - removePrevious
        LabelContainer::where('labelId', $label->id)->delete();

        foreach ($request->containers ?? [] as $container) {


            // 2.1: create
            $labelContainer = new LabelContainer();


            $labelContainer->containerId = $container;
            $labelContainer->labelId = $label->id;


            $labelContainer->save();


        } // end loop









        return response()->json(['message' => 'Label has been updated'], 200);




    } // end function










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











} // end controller

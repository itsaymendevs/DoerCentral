<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\StockContainer;
use App\Models\StockItem;
use App\Models\StockItemPurchase;
use App\Models\StockItemPurchaseContainer;
use App\Models\StockItemPurchaseItem;
use App\Models\StockItemPurchaseLabel;
use App\Models\StockLabel;
use App\Models\Vendor;
use App\Models\VendorContainer;
use App\Models\VendorItem;
use App\Models\VendorLabel;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use App\Models\Bag;
use App\Models\Container;
use App\Models\Label;
use App\Models\LabelContainer;
use App\Models\ServingItem;

class StockController extends Controller
{

    use HelperTrait;


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









    public function updateContainerLidCharge(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $container = Container::find($request->id);


        // 1.2: general
        $container->lidCharge = $request->lidCharge ?? null;


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










    public function storeItem(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $item = new Item();


        // 1.2: general
        $item->name = $request->name;
        $item->desc = $request?->desc ?? null;
        $item->charge = $request?->charge ?? null;

        $item->imageFile = $request->imageFileName ?? null;


        $item->save();






        return response()->json(['message' => 'Item has been created'], 200);




    } // end function










    // --------------------------------------------------------------------------------------------








    public function updateItem(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $item = Item::find($request->id);


        // 1.2: general
        $item->name = $request->name;
        $item->desc = $request?->desc ?? null;
        $item->charge = $request?->charge ?? null;

        $item->imageFile = $request->imageFileName ?? null;


        $item->save();






        return response()->json(['message' => 'Item has been update'], 200);




    } // end function










    // --------------------------------------------------------------------------------------------












    public function updateItemCharge(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $item = Item::find($request->id);


        // 1.2: general
        $item->charge = $request->charge ?? null;


        $item->save();






        return response()->json(['message' => 'Charge has been updated'], 200);




    } // end function









    // --------------------------------------------------------------------------------------------









    public function removeItem(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Item::find($id)->delete();


        return response()->json(['message' => 'Item has been removed'], 200);



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
        $label->charge = $request->charge ?? 0;

        $label->width = $request->width;
        $label->height = $request->height;
        $label->desc = $request->desc ?? null;
        $label->radius = $request->radius ?? 0;



        // 1.2.5: isVertical
        $label->isVertical = $request->isVertical ?? false;




        // 1.3: colors
        $label->fontColor = $request->fontColor ?? null;
        $label->backgroundColor = $request->backgroundColor ?? null;
        $label->borderColor = $request?->borderColor ?? null;
        $label->labelBackgroundColor = $request?->labelBackgroundColor ?? null;

        $label->caloriesColor = $request?->caloriesColor ?? null;
        $label->proteinsColor = $request?->proteinsColor ?? null;
        $label->carbsColor = $request?->carbsColor ?? null;
        $label->fatsColor = $request?->fatsColor ?? null;






        // 1.4: padding
        $label->paddingLeft = $request?->paddingLeft ?? null;
        $label->paddingRight = $request?->paddingRight ?? null;
        $label->paddingTop = $request?->paddingTop ?? null;
        $label->paddingBottom = $request?->paddingBottom ?? null;








        // 1.5: showOptions
        $label->showProductionDate = boolval($request->showProductionDate) ?? false;
        $label->showExpiryDate = boolval($request->showExpiryDate) ?? false;
        $label->showFooterImageFile = boolval($request->showFooterImageFile) ?? false;
        $label->showCustomerName = boolval($request->showCustomerName) ?? false;
        $label->showMealName = boolval($request->showMealName) ?? false;
        $label->showMealMacros = boolval($request->showMealMacros) ?? false;
        $label->showServingInstructions = boolval($request->showServingInstructions) ?? false;










        // 1.5: imageFile
        $label->imageFile = $request->imageFileName ?? null;
        $label->footerImageFile = $request->footerImageFileName ?? null;


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




        // 1: get instance
        $label = Label::find($request->id);




        // 1.2: general
        $label->name = $request->name;
        $label->charge = $request->charge ?? 0;

        $label->width = $request->width;
        $label->height = $request->height;
        $label->desc = $request->desc ?? null;
        $label->radius = $request->radius ?? 0;


        // 1.2.5: isVertical
        $label->isVertical = $request->isVertical ?? false;



        // 1.3: colors
        $label->fontColor = $request->fontColor ?? null;
        $label->backgroundColor = $request->backgroundColor ?? null;
        $label->borderColor = $request?->borderColor ?? null;
        $label->labelBackgroundColor = $request?->labelBackgroundColor ?? null;

        $label->caloriesColor = $request?->caloriesColor ?? null;
        $label->proteinsColor = $request?->proteinsColor ?? null;
        $label->carbsColor = $request?->carbsColor ?? null;
        $label->fatsColor = $request?->fatsColor ?? null;






        // 1.4: padding
        $label->paddingLeft = $request?->paddingLeft ?? null;
        $label->paddingRight = $request?->paddingRight ?? null;
        $label->paddingTop = $request?->paddingTop ?? null;
        $label->paddingBottom = $request?->paddingBottom ?? null;








        // 1.5: showOptions
        $label->showProductionDate = boolval($request->showProductionDate) ?? false;
        $label->showExpiryDate = boolval($request->showExpiryDate) ?? false;
        $label->showFooterImageFile = boolval($request->showFooterImageFile) ?? false;
        $label->showCustomerName = boolval($request->showCustomerName) ?? false;
        $label->showMealName = boolval($request->showMealName) ?? false;
        $label->showMealMacros = boolval($request->showMealMacros) ?? false;
        $label->showServingInstructions = boolval($request->showServingInstructions) ?? false;










        // 1.5: imageFile
        $label->imageFile = $request->imageFileName ?? null;
        $label->footerImageFile = $request->footerImageFileName ?? null;


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













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------








    public function updateBag(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $bag = Bag::find($request->id);




        // 1.2: general
        $bag->price = $request->price ?? 0;
        $bag->imageFile = $request->imageFileName ?? null;


        $bag->save();






        return response()->json(['message' => 'Bag has been updated'], 200);




    } // end function










    // --------------------------------------------------------------------------------------------








    public function updateServings(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $serving = ServingItem::find($request->id);




        // 1.2: general
        $serving->cutleryPrice = $request->cutleryPrice ?? 0;

        $serving->save();






        return response()->json(['message' => 'Cost has been updated'], 200);




    } // end function


















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeVendor(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $vendor = new Vendor();



        // 1.2: basic
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;




        $vendor->save();







        return response()->json(['message' => 'Vendor has been created'], 200);




    } // end function







    // --------------------------------------------------------------------------------------------








    public function updateVendor(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $vendor = Vendor::find($request->id);




        // 1.2: basic
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;


        $vendor->save();






        return response()->json(['message' => 'Vendor has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------








    public function removeVendor(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Vendor::find($id)->delete();


        return response()->json(['message' => 'Vendor has been removed'], 200);



    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------










    public function storeVendorItem(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create instance
        if ($request->type == 'Containers') {

            $vendorItem = new VendorContainer();
            $vendorItem->containerId = $request->itemId;


        } elseif ($request->type == 'Labels') {

            $vendorItem = new VendorLabel();
            $vendorItem->labelId = $request->itemId;

        } elseif ($request->type == 'Items') {

            $vendorItem = new VendorItem();
            $vendorItem->itemId = $request->itemId;

        } // end if







        // 1.3: general
        $vendorItem->unitId = $request->unitId ?? null;
        $vendorItem->vendorId = $request->vendorId ?? null;
        $vendorItem->sellPrice = $request->sellPrice ?? null;




        $vendorItem->save();






        return response()->json(['message' => 'Item has been created'], 200);




    } // end function







    // --------------------------------------------------------------------------------------------








    public function updateVendorItem(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        if ($request->type == 'Containers') {

            $vendorItem = VendorContainer::find($request->id);

        } elseif ($request->type == 'Labels') {

            $vendorItem = VendorLabel::find($request->id);

        } elseif ($request->type == 'Items') {

            $vendorItem = VendorItem::find($request->id);

        } // end if





        // 1.3: general
        $vendorItem->sellPrice = $request->sellPrice ?? null;




        $vendorItem->save();







        return response()->json(['message' => 'Item has been updated'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeVendorItem(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        if ($request->type == 'Containers') {

            VendorContainer::find($request->id)->delete();

        } elseif ($request->type == 'Labels') {

            VendorLabel::find($request->id)->delete();

        } elseif ($request->type == 'Items') {

            VendorItem::find($request->id)->delete();

        } // end if






        return response()->json(['message' => 'Item has been removed'], 200);



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
        $purchase = new StockItemPurchase();



        // 1.2: basic
        $purchase->receivingDate = $request->receivingDate;
        $purchase->purchaseID = $request->purchaseID;
        $purchase->PONumber = $this->makeSerial('PO', StockItemPurchase::count() + 1);
        $purchase->remarks = $request->remarks;

        $purchase->vendorId = $request->vendorId;


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
        $purchase = StockItemPurchase::find($request->id);


        // :: savePrevious
        $previousVendor = $purchase->vendorId;




        // 1.2: basic
        $purchase->receivingDate = $request->receivingDate;
        $purchase->purchaseID = $request->purchaseID;
        $purchase->remarks = $request->remarks;

        $purchase->vendorId = $request->vendorId;


        $purchase->save();









        // ! 2: remove purchaseItems
        if ($previousVendor != $request->vendorId) {

            StockItemPurchaseItem::where('stockItemPurchaseId', $purchase->id)->delete();
            StockItemPurchaseLabel::where('stockItemPurchaseId', $purchase->id)->delete();
            StockItemPurchaseContainer::where('stockItemPurchaseId', $purchase->id)->delete();

        } // end if







        return response()->json(['message' => 'Purchase has been updated'], 200);





    } // end function












    // --------------------------------------------------------------------------------------------








    public function confirmPurchase(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $purchase = StockItemPurchase::find($request->id);

        $purchase->isConfirmed = true;


        $purchase->save();






        // --------------------
        // --------------------






        // 2: + toStock





        // 2.1: containers
        foreach ($request->receivedContainersQuantity ?? [] as $id => $quantity) {



            // ** NOTE: QUANTITY IS IN Piece ONLY IN STOCK!
            // ** THATS WHY NO UNIT MENTIONED




            // 2.1.1: updateReceivedQuantity
            $purchaseItem = StockItemPurchaseContainer::find($id);

            $purchaseItem->receivedQuantity = $quantity;
            $purchaseItem->save();






            // 2.1.2: createStock
            $stock = new StockContainer();

            $stock->buyPrice = $purchaseItem->buyPrice;
            $stock->availableQuantity = $quantity;

            $stock->containerId = $purchaseItem->containerId;
            $stock->stockItemPurchaseId = $purchaseItem->stockItemPurchaseId;

            $stock->save();



        } // end loop








        // ------------------------------------------------------
        // ------------------------------------------------------






        // 2.2: labels
        foreach ($request->receivedLabelsQuantity ?? [] as $id => $quantity) {



            // ** NOTE: QUANTITY IS IN Piece ONLY IN STOCK!
            // ** THATS WHY NO UNIT MENTIONED




            // 2.1.1: updateReceivedQuantity
            $purchaseItem = StockItemPurchaseLabel::find($id);

            $purchaseItem->receivedQuantity = $quantity;
            $purchaseItem->save();






            // 2.2.2: createStock
            $stock = new StockLabel();

            $stock->buyPrice = $purchaseItem->buyPrice;
            $stock->availableQuantity = $quantity;

            $stock->labelId = $purchaseItem->labelId;
            $stock->stockItemPurchaseId = $purchaseItem->stockItemPurchaseId;

            $stock->save();



        } // end loop









        // ------------------------------------------------------
        // ------------------------------------------------------






        // 2.3: labels
        foreach ($request->receivedItemsQuantity ?? [] as $id => $quantity) {



            // ** NOTE: QUANTITY IS IN Piece ONLY IN STOCK!
            // ** THATS WHY NO UNIT MENTIONED




            // 2.1.1: updateReceivedQuantity
            $purchaseItem = StockItemPurchaseItem::find($id);

            $purchaseItem->receivedQuantity = $quantity;
            $purchaseItem->save();






            // 2.1.2: createStock
            $stock = new StockItem();

            $stock->buyPrice = $purchaseItem->buyPrice;
            $stock->availableQuantity = $quantity;

            $stock->itemId = $purchaseItem->itemId;
            $stock->stockItemPurchaseId = $purchaseItem->stockItemPurchaseId;

            $stock->save();



        } // end loop





        return response()->json(['message' => 'Purchase has been confirmed'], 200);





    } // end function






    // --------------------------------------------------------------------------------------------





    public function removePurchase(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        StockItemPurchase::find($id)->delete();


        return response()->json(['message' => 'Purchase has been removed'], 200);



    } // end function
















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------









    public function storePurchaseItem(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: getDependencies
        $purchase = StockItemPurchase::find($request->stockItemPurchaseId);



        // 1.2: get item
        if ($request->type == 'Containers') {

            $vendorItem = VendorContainer::where('vendorId', $purchase->vendorId)
                ->where('containerId', $request->itemId)->first();


        } elseif ($request->type == 'Labels') {


            $vendorItem = VendorLabel::where('vendorId', $purchase->vendorId)
                ->where('labelId', $request->itemId)->first();


        } elseif ($request->type == 'Items') {


            $vendorItem = VendorItem::where('vendorId', $purchase->vendorId)
                ->where('itemId', $request->itemId)->first();


        } // end if










        // ----------------------------------------------
        // ----------------------------------------------








        // 2: create

        if ($request->type == 'Containers') {

            $purchaseItem = new StockItemPurchaseContainer();
            $purchaseItem->containerId = $request->itemId;


        } elseif ($request->type == 'Labels') {

            $purchaseItem = new StockItemPurchaseLabel();
            $purchaseItem->labelId = $request->itemId;


        } elseif ($request->type == 'Items') {

            $purchaseItem = new StockItemPurchaseItem();
            $purchaseItem->itemId = $request->itemId;


        } // end if







        // 2.1: general
        $purchaseItem->quantity = doubleval($request->quantity);



        // 2.2: stockPurchase - buyPrice - unit
        $purchaseItem->stockItemPurchaseId = $purchase->id;
        $purchaseItem->buyPrice = $vendorItem->sellPrice;
        $purchaseItem->unitId = $vendorItem->unitId;


        $purchaseItem->save();






        return response()->json(['message' => 'Purchase Item has been created'], 200);




    } // end function






    // --------------------------------------------------------------------------------------------








    public function updatePurchaseItem(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        if ($request->type == 'Containers') {

            $purchaseItem = StockItemPurchaseContainer::find($request->id);


        } elseif ($request->type == 'Labels') {


            $purchaseItem = StockItemPurchaseLabel::find($request->id);


        } elseif ($request->type == 'Items') {


            $purchaseItem = StockItemPurchaseItem::find($request->id);


        } // end if








        // 1.2: general
        $purchaseItem->quantity = doubleval($request->quantity);

        $purchaseItem->save();







        return response()->json(['message' => 'Purchase Item has been updated'], 200);




    } // end function












    // --------------------------------------------------------------------------------------------








    public function removePurchaseItem(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: remove instance
        if ($request->type == 'Containers') {

            StockItemPurchaseContainer::find($request->id)->delete();

        } elseif ($request->type == 'Labels') {

            StockItemPurchaseLabel::find($request->id)->delete();

        } elseif ($request->type == 'Items') {

            StockItemPurchaseItem::find($request->id)->delete();

        } // end if





        return response()->json(['message' => 'Purchase Item has been removed'], 200);



    } // end function












} // end controller


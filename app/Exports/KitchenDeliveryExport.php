<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class KitchenDeliveryExport implements FromCollection, WithHeadings
{



    // :: variables
    public $deliveries;




    public function __construct($deliveries)
    {


        // :: handleParams
        $this->deliveries = $deliveries;



    } // end function








    // ------------------------------------------------------------------








    public function headings() : array
    {



        // 1: headings
        return ["SN", "Customer", "Plan", "Company", "Timing", "Address", "Date"];




    } // end headings











    // ------------------------------------------------------------------








    public function collection()
    {



        // :: combineRows - dependencies
        $combineRows = array();

        $counter = 1;






        // -----------------------------
        // -----------------------------








        // :: loop - deliveries
        foreach ($this->deliveries as $delivery) {











            // :: create instance
            $content = new stdClass();



            // 1: SN
            $content->SN = $counter++;




            // 2: customer - plan
            $content->customer = $delivery->customer->fullName();
            $content->plan = $delivery->subscription->plan->name;




            // 3: company
            $content->company = '';




            //  ---------------------------
            //  ---------------------------






            // 4: deliveryTime
            $content->deliveryTime = $delivery->customer->deliveryTimeByDay($delivery->deliveryDate)?->title ?? '';






            //  ---------------------------
            //  ---------------------------






            // 5: customerAddress
            $customerAddress = $delivery->customer->addressByDay($delivery->deliveryDate);

            if ($customerAddress) {

                $content->address = "{$customerAddress?->city->name} - {$customerAddress?->district->name}\n";
                $content->address .= $customerAddress?->apartment ? "Apartment. " . $customerAddress->apartment . "\n" : "";
                $content->address .= $customerAddress?->floor ? "Floor. " . $customerAddress->floor : "";


            } else {

                $content->address = "";

            } // end if








            //  ---------------------------
            //  ---------------------------







            // 6: deliveryDate
            $content->deliveryDate = date('d / m / Y', strtotime($delivery->deliveryDate));









            // :: append
            array_push($combineRows, $content);




        } // end loop  - deliveries













        // :: returnCombineRows
        return collect($combineRows);



    } // end function











    // -------------------------------------------------------------











} // end class








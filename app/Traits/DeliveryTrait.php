<?php

namespace App\Traits;

use stdClass;


trait DeliveryTrait
{


    use HelperTrait;


    protected function checkDeliveryDaysConflict($deliveryDays, $upcomingDeliveries, $startDate, $upcomingStartDate)
    {




        // :: root
        $untilDate = null;
        $dateCounter = 0;
        $deliveryCounter = 0;
        $deliveryTotalCounter = intval($upcomingDeliveries);
        $deliveryWeekDays = $deliveryDays;









        // :: loop
        while (true) {




            // 1: getDeliveryDate - deliveryAsWeekDay
            $deliveryDate = date('Y-m-d', strtotime($startDate . "+{$dateCounter} days"));

            $deliveryAsWeekDay = date('l', strtotime($deliveryDate));





            // :: ifExists
            if (in_array($deliveryAsWeekDay, $deliveryWeekDays)) {



                // 1.2.1: increaseCounter
                $deliveryCounter++;






                // 1.2.2: checkIfDone - save untilDate
                if ($deliveryCounter == $deliveryTotalCounter) {


                    $untilDate = $deliveryDate;
                    break;

                } // end if


            } // end if









            // :: increaseCounter
            $dateCounter++;




        } // end loop











        // ------------------------------------------
        // ------------------------------------------





        // 2: conflict - or notConflict
        if ($upcomingStartDate <= $untilDate)
            return true;
        else
            return false;






    } // end function








    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------









} // end trait


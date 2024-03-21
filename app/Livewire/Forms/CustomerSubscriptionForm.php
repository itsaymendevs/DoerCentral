<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerSubscriptionForm extends Form
{

    // :: STEP 1
    public $phone, $email, $name, $whatsapp, $gender, $planId, $password;

    public $id;




    // --------------------------------------------------





    // :: STEP 2
    public $planBundleId, $bundleRangeId, $planDays, $startDate;


    public $bundleTypes = [];


    // :: helpers
    public $bundleRangePricePerDay, $totalBundleRangeCalories, $totalBundleRangePrice;

    public $bundleTypesInArray;







    // --------------------------------------------------






    // :: STEP 3
    public $bag, $bagPrice;


    public $allergyLists = [], $excludeLists = [];



    // :: helpers
    public $bagImageFile;




    // --------------------------------------------------






    // :: STEP 4
    public $cityId, $cityDistrictId, $cityDeliveryTimeId, $locationAddress, $apartment, $floor;


    public $deliveryDays = [];










    // --------------------------------------------------






    // :: STEP 5
    public $promoCode, $promoCodeDiscountPrice;

    public $totalPrice;
    public $totalCheckoutPrice;

    public $paymentMethodId, $isPaymentDone = false;













} // end form

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




} // end form

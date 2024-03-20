<?php

namespace Database\Seeders;

use App\Models\CustomerSubscriptionSetting;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSubscriptionSettingSeeder extends Seeder
{
    public function run() : void
    {



        // 1: dependencies
        $paymentMethod = PaymentMethod::where('name', 'STRIPE')->first();


        // ::root
        CustomerSubscriptionSetting::create([
            'minimumDeliveryDays' => 3,
            'paymentMethodId' => $paymentMethod->id
        ]);


    } // end function



} // end seeder


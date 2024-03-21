<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PaymentMethodSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $paymentMethods = Storage::disk('public')->get('sources/PaymentMethods.json');
        $paymentMethods = json_decode($paymentMethods, true);


        for ($i = 0; $i < count($paymentMethods); $i++) {
            PaymentMethod::create([
                'name' => $paymentMethods[$i]['name'],
                'envKey' => $paymentMethods[$i]['envKey'] ?? null,
                'envSecondKey' => $paymentMethods[$i]['envSecondKey'] ?? null,
                'envThirdKey' => $paymentMethods[$i]['envThirdKey'] ?? null,
            ]);
        } // end loop


    } // end function



} // end seeder

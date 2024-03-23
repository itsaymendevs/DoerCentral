<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;





    public function wallet()
    {

        return $this->hasOne(CustomerWallet::class, 'customerId');

    } // end function





    public function deposits()
    {

        return $this->hasMany(CustomerWalletDeposit::class, 'customerId');

    } // end function








    public function subscriptions()
    {

        return $this->hasMany(CustomerSubscription::class, 'customerId');

    } // end function






    public function subscriptionTypes()
    {

        return $this->hasMany(CustomerSubscriptionType::class, 'customerId');

    } // end function










    public function latestSubscription()
    {

        return $this->subscriptions()->latest()->first();

    } // end function







    public function addresses()
    {

        return $this->hasMany(CustomerAddress::class, 'customerId');

    } // end function







    public function deliveryDays()
    {

        return $this->hasMany(CustomerDeliveryDay::class, 'customerId');

    } // end function








    public function deliveries()
    {

        return $this->hasMany(CustomerSubscriptionDelivery::class, 'customerId');

    } // end function






    public function excludes()
    {

        return $this->hasMany(CustomerExclude::class, 'customerId');

    } // end function







    public function allergies()
    {

        return $this->hasMany(CustomerAllergy::class, 'customerId');

    } // end function









    // --------------------------------------------------------
    // --------------------------------------------------------












    public function unCollectedBags()
    {


        // 1: dependencies
        $todayDate = date('Y-m-d', strtotime('+4 hours'));


        return $this->deliveries()?->where('isBagCollected', 0)
                ?->where('deliveryDate', '<', $todayDate)
                ?->count() ?? 0;



    } // end function








} // end model

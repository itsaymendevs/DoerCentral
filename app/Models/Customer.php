<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;





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










    // --------------------------------------------------------








    public function addressByDay($date)
    {


        // 1: getWeekDay
        $currentWeekDay = date('l', strtotime($date));



        // 1.2: loop - deliveryDays
        $deliveryDay = $this->deliveryDays()->where('weekDay', $currentWeekDay)?->first() ?? null;





        // :: return customerAddress
        return $deliveryDay ? $deliveryDay->customerAddress : null;



    } // end function





} // end model

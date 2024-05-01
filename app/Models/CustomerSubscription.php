<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscription extends Model
{
    use HasFactory;




    public function types()
    {

        return $this->hasMany(CustomerSubscriptionType::class, 'customerSubscriptionId');

    } // end function







    public function deliveries()
    {

        return $this->hasMany(CustomerSubscriptionDelivery::class, 'customerSubscriptionId');

    } // end function







    public function pauses()
    {

        return $this->hasMany(CustomerSubscriptionPause::class, 'customerSubscriptionId');

    } // end function





    public function extends()
    {

        return $this->hasMany(CustomerSubscriptionExtend::class, 'customerSubscriptionId');

    } // end function





    public function shortens()
    {

        return $this->hasMany(CustomerSubscriptionShorten::class, 'customerSubscriptionId');

    } // end function






    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function





    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');

    } // end function






    public function bundle()
    {

        return $this->belongsTo(PlanBundle::class, 'planBundleId');

    } // end function





    public function range()
    {

        return $this->belongsTo(PlanRange::class, 'planRangeId');

    } // end function






    public function calendar()
    {

        return $this->belongsTo(MenuCalendar::class, 'menuCalendarId');

    } // end function






    public function bag()
    {

        return $this->belongsTo(Bag::class, 'bagId');

    } // end function












    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------







    public function pricePerDay()
    {



        // 1: totalCheckoutPrice - bagPrice
        $totalCheckoutPriceOnly = $this->totalCheckoutPrice - $this->bagPrice;


        // :: checkValidity
        $totalCheckoutPriceOnly < 0 ? $totalCheckoutPriceOnly = 0 : null;




        // 2: getPricePerDay
        $pricePerDay = $totalCheckoutPriceOnly / $this->planDays;




        // :: return
        return $pricePerDay ?? 0;




    } // end function










    public function typesInArray()
    {

        return $this->types()?->get()?->pluck('mealTypeId')?->toArray();

    } // end function










    public function upcomingDeliveries()
    {


        // 1: getDeliveries
        $upcomingDeliveries = $this->deliveries()?->where('deliveryDate', '>=', date('d-m-Y'))?->get() ?? [];



        return $upcomingDeliveries;


    } // end function













    public function completedDeliveries()
    {


        // 1: getDeliveries
        $completedDeliveries = $this->deliveries()?->where('status', 'Completed')?->get() ?? [];


        return $completedDeliveries;


    } // end function










    public function incompleteDeliveries()
    {


        // 1: getDeliveries
        $pendingDeliveries = $this->deliveries()?->where('status', '!=', 'Completed')?->get() ?? [];



        return $pendingDeliveries;


    } // end function










    public function canceledPauses()
    {

        return $this->pauses()?->where('isCanceled', true)->get() ?? [];

    } // end function





} // end model

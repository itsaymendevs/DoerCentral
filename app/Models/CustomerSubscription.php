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






    public function bag()
    {

        return $this->belongsTo(Bag::class, 'bagId');

    } // end function












    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
















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






} // end model

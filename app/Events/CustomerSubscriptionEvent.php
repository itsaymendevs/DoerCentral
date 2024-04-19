<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerSubscriptionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    // :: variables
    public $customerName, $planName;
    public $alertMessage;





    public function __construct($customerName, $planName)
    {



        // 1: getParams
        $this->customerName = $customerName;
        $this->planName = $planName;




        // 1.2: makeAlert
        $this->alertMessage = "{$customerName} has subscribed to {$planName} plan";



    } // end function










    // ------------------------------------------------------------
    // ------------------------------------------------------------








    public function broadcastOn() : array
    {

        return ['customerSubscriptionChannel'];

    } // end function









    // ------------------------------------------------------------
    // ------------------------------------------------------------






    public function broadcastAs()
    {


        return 'customerSubscriptionChannel';


    } // end function






} // end class

<?php

use Illuminate\Support\Facades\Broadcast;





// :: root
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});






// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------







// 1: customerSubscription
Broadcast::channel('customerSubscriptionChannel', function ($customerName, $planName) {
    return true;
});

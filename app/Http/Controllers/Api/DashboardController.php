<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{







    public function updateNotifications(Request $request)
    {


        // 1: get instance
        Notification::where('isPreviewed', false)
            ->where('isForDashboard', true)
            ->update([
                'isPreviewed' => true
            ]);





        return response()->json(['message' => 'Notifications has been previewed'], 200);




    } // end function








    // --------------------------------------------------------------------------------------------












} // end controller

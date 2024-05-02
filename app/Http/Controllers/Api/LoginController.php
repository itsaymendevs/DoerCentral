<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{



    public function checkUser(Request $request)
    {

        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: checkUser
        $user = User::where('email', $request->email)->first();




        // 1.2: checkValidity - token
        if ($user && Hash::check($request->password, $user->password)) {




            // 1.2.1: check inactive
            if (! $user->isActive)
                return response()->json(['error' => 'Account Restricted'], 401);





            // :: continue
            $token = $user->createToken('user', ['role:user'])->plainTextToken;
            $userId = $user->id;
            $userName = $user->name;




            return response()->json(['token' => $token, 'userName' => $userName, 'userId' => $userId], 200);



        } // end if




        // 1.3: un-authorized
        return response()->json(['error' => 'Incorrect Credentials'], 401);



    } // end function




} // end controller

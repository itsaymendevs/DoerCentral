<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserApiMiddleware
{


    public function handle(Request $request, Closure $next) : Response
    {


        // :: checkToken
        if (auth()->user()->tokenCan('role:user')) {

            return $next($request);

        } // end if


        return response()->json(['error' => 'Un-Authorized Access'], 401);

    } // end function




} // end middleware

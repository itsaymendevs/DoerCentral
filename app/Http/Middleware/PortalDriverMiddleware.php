<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PortalDriverMiddleware
{

    public function handle(Request $request, Closure $next) : Response
    {


        // 1: continue
        if (! empty(session('driverPortalToken')))
            return $next($request);



        // 2: returnLogin
        return redirect()->route('portals.driver.login');

    } // end function





} // end driverMiddleware

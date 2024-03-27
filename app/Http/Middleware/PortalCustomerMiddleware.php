<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PortalCustomerMiddleware
{


    public function handle(Request $request, Closure $next) : Response
    {


        // 1: continue
        if (! empty(session('customerPortalToken')))
            return $next($request);



        // 2: returnLogin
        return redirect()->route('portals.customer.login');

    } // end function





} // end customerMiddleware

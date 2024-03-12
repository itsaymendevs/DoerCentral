<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{


    public function handle(Request $request, Closure $next) : Response
    {


        // 1: continue
        if (! empty(session('token')))
            return $next($request);



        // 2: returnLogin
        return redirect()->route('dashboard.login');

    } // end function





} // end UserMiddleware

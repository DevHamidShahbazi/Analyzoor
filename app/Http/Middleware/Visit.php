<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

class Visit
{
    public function handle(Request $request, Closure $next): Response
    {
//        $ip = Location::get($request->ip());
//        $countryName = null;
//        if (isset( $ip->countryName)){
//            $countryName = $ip->countryName;
//        }
//        if ($countryName == 'Iran'){
            visitor()->visit();
//        }
        return $next($request);
    }
}

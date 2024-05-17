<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verify
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()){
            if (auth()->user()->verify == '1' || !(is_null(auth()->user()->email)) ) {
                return $next($request);
            }else{
                return redirect(route('verify.show'));
            }
        }
        return redirect(route('verify.show'));
    }
}

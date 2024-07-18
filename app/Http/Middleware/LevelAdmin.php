<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class levelAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()){
            if (auth()->user()->level == 'Developer' || auth()->user()->level == 'admin'){
                return $next($request);
            }else{
                return abort(404);
            }
        }

        return abort(404);
    }
}

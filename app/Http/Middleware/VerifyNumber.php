<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyNumber
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()){
            if (!auth()->user()->phone){
                return redirect(route('userPanel.profile.index'));
            }
            if (auth()->user()->verify == '1') {
                return $next($request);
            }else{
                return redirect(route('verify.show'));
            }
        }else{
            return redirect(route('verify.show'));
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProtectAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $uri = $request->getRequestUri();

//        if(substr($uri,0,7) == '/admin/'){
//                if(!Auth::user()->hasRole('superadministrator')){
//                    return redirect()->route('home');
//                }
//        }

        return $next($request);
    }
}

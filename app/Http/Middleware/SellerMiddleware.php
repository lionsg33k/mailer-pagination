<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // *  take the connected  user 
        $user  = auth()->user();

        if ($user && $user->type == "seller" ) {
            return $next($request);
        }

        return abort(403, "you are  not a seller sir f7alk");
    }
}

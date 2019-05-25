<?php

namespace App\Http\Middleware;

use Closure;
use Composer\DependencyResolver\Request;

class LogovanjeMiddleware
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
        if($request->session()->has('korisnik'))
        {
            return $next($request);
        }else
        {
            \Log::critical("Korisnik je pokusao da pristupi stranicama za korisnika -> " . $request->ip());
            return redirect()->route('registracija');

        }

    }
}

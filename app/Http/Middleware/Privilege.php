<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Privilege
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user())
        {
            $privilege = Auth::user()->privilege->nom;
        }
        else
        {
            $privilege = 'client';
        }

        if($privilege == 'administrateur' || $privilege == 'employé')
        {
            return $next($request);
        }

        return redirect(route('login'));
    }
}

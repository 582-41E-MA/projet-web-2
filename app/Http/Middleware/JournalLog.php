<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Journal;  

class JournalLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        $response = $next($request);

        Journal::create([
            'nom' => auth()->check() ? auth()->user()->courriel : 'Guest',
            'date_visite' => now(), 
            'page_visite' => $request->url(), 
            'ip' => $request->ip(),
        ]);

        return $response;
    }
}
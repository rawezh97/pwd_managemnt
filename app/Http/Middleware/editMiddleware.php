<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class editMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (count($request->all()) == 1 ) {
            return redirect()->back()->with('warning_check' , 'please select of of the item ');
        }
        return $next($request);
    }
}

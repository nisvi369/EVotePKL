<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pemilih
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
        if (Auth::check() && Auth::user()->Masyarakat()->level == 'pemilih') {
            return $next($request);
        }
        return redirect('/signIn');
    }
}

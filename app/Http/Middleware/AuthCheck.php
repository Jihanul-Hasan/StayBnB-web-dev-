<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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

        if (!session()->has('loggedUser') && ($request->path() != 'auth/dashboard' && $request->path()  != '/auth/register')) {
            return redirect('welcome');
        }
        if (session()->has('loggedUser') && ($request->path() == 'auth/dashboard'  && $request->path()  == '/auth/register')) {
            return back();
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('ADMIN_LOGIN')) {
            return redirect('/admin')->with('loginmsg', 'Please login to access this page.');
        }
        
        return $next($request);
    }
}
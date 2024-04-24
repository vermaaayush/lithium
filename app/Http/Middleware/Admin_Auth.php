<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin_Auth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('admin')) {
            return $next($request); // Admin session exists, allow access
        }

        // Admin session not found, redirect to login
        return redirect('/admin')->with('error', 'You are not authorized to access this page.');
    }
}

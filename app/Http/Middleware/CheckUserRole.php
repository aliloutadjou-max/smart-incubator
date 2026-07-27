<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    
    {
    
        if (!session()->has('user_role')) {
            return redirect('/login');
        }

        if (session('user_role') != $role) {
            return redirect('/login');
        }

        return $next($request);
    }
}
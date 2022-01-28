<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_admin) {
            return $next($request);
        }

        return abort(403, 'Only administrators can access this page');
    }
}

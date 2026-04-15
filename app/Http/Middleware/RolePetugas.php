<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolePetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (!session()->has('petugas')) {
            return redirect('/login_petugas');
        }

        if (session('petugas.level') !== $role) {
            abort(403);
        }

        return $next($request);
    }
}

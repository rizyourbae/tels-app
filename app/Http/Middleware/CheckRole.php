<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // Loop melalui role yang diizinkan
        foreach ($roles as $role) {
            // Jika user punya salah satu role yang diizinkan, lanjutkan
            if ($request->user()->hasRole($role)) {
                return $next($request);
            }
        }

        // Jika tidak punya role yang diizinkan, tolak akses
        abort(403, 'UNAUTHORIZED ACTION.');
    }
}

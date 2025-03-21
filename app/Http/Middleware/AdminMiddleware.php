<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('web')->user(); 

        // ✅ Vérifier que le rôle est bien "admin"
        if (!$user || $user->role !== 'admin') {
            return redirect('/')->with('error', 'Accès refusé.');
        }
        return $next($request);
    }
}

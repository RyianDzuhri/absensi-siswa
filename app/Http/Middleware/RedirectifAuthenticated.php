<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated as RedirecctifAuthenticatedMiddleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RedirectifAuthenticated extends RedirecctifAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response | JsonResponse
    {
        if(Auth::guard('admin')->check()){
            return redirect(route('admin.dashboard.index'));
        }else if(Auth::guard('wali_kelas')->check()){
            return redirect(route('walikelas.dashboard.index'));
        }else if(Auth::guard('ortu')->check()){
            return redirect(route('ortu.dashboard.index'));
        }

        return $next($request);
    }
}

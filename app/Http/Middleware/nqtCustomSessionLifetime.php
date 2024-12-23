<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class nqtCustomSessionLifetime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('admin')) {
            $remember = $request->cookie('remember') === 'true';
            $lifetime = $remember ? 43200 : env('SESSION_LIFETIME', 120);

            Cookie::queue(
                'XSRF-TOKEN',
                $request->session()->token(),
                $lifetime
            );

            Cookie::queue(
                'laravel_session',
                $request->session()->getId(),
                $lifetime
            );
        }

        return $next($request);
    }



}

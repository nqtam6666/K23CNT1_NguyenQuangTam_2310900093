<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class nqtCheckAdminSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu session có chứa 'admin.id'
        if (!$request->session()->has('admin.id')) {
            // Nếu không, chuyển hướng về trang đăng nhập hoặc trang khác
            return redirect('/admin');
        }

        // Nếu có, tiếp tục xử lý yêu cầu
        return $next($request);
    }
}

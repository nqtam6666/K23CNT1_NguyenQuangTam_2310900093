<?php

namespace App\Http\Middleware;

use App\Models\nqtQuanTri;
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
        if (!$request->session()->has('admin.id')) {
            // Check for remember token
            $rememberToken = $request->cookie('remember_admin');
            if ($rememberToken) {
                $admin = nqtQuanTri::where('remember_token', $rememberToken)->first();
                if ($admin) {
                    // Re-authenticate the user
                    $request->session()->put('admin', [
                        'id' => $admin->id,
                        'email' => $admin->nqtTaiKhoan,
                        'status' => $admin->nqtTrangThai,
                    ]);
                    return $next($request);
                }
            }
            return redirect(route('nqtadmin.getSession1'));
        }
        return $next($request);
    }
}

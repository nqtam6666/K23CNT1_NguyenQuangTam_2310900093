<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nqtBaseAdminController extends Controller
{
    protected $nqtUserAdmin;

    public function __construct()
    {
        $this->middleware('nqtcheckAdminSession');

        // Thêm middleware để lấy thông tin admin từ session
        $this->middleware(function ($request, $next) {
            $this->nqtUserAdmin = $request->session()->get('admin.email', 'Quản trị viên');
            // Chia sẻ biến với tất cả các view
            view()->share('nqtUserAdmin', $this->nqtUserAdmin);

            return $next($request);
        });
    }
}

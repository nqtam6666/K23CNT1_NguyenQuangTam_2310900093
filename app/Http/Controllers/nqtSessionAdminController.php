<?php

namespace App\Http\Controllers;

use App\Models\nqtKhachHang;
use App\Models\nqtLoaiSanPham;
use App\Models\nqtQuanTri;
use App\Models\nqtSanPham;
use Illuminate\Http\Request;

class nqtSessionAdminController extends Controller
{
    public function __construct()
    {
        // Áp dụng middleware cho tất cả các hành động trong controller này
        $this->middleware('nqtcheckAdminSession');
    }
    public function getSessionData(Request $request)
    {
        // Kiểm tra xem session có chứa admin ID hay không
        if ($request->session()->has('admin.id')) {
            // Lấy dữ liệu từ model (hoặc logic)
            $nqttotalUsers = nqtKhachHang::count(); // Đếm số lượng người dùng (giả sử có model User)
            $nqttotalTypeProducts = nqtLoaiSanPham::count(); // Tương tự với sản phẩm
            $nqttotalProducts = nqtSanPham::count(); // Tương tự với bình luận
            $nqttotalAdmins = nqtQuanTri::count(); // Tương tự với admin
            $nqtUserAdmin = $request->session()->get('admin.email', 'Quản trị viên');
            // Truyền dữ liệu sang view
            return view('nqtAdmin.nqtDashboard', compact('nqttotalUsers', 'nqttotalTypeProducts', 'nqttotalProducts', 'nqttotalAdmins', 'nqtUserAdmin'));
        } else {
            return redirect('/admin');
        }
    }


    #Lưu dữ liệu vào session
    public function storeSessionData(Request $request)
    {
        $request->session()->put('name','nqtam');
        echo "<h2> Dữ liệu đã được lưu và session </h2>";
    }

    #Xóa dữ liệu trong session
    public function deleteSessionData(Request $request)
    {
        // Xóa session với khóa 'admin.id'
        $request->session()->forget('admin');

        // Thông báo dữ liệu đã được xóa khỏi session
        echo "<h2> Dữ liệu đã được xóa khỏi session </h2>";

        // Chuyển hướng về trang login
        return redirect('/admin')->with('nqt-error', 'Đăng xuất thành công!');

    }

}

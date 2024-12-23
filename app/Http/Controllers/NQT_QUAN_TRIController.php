<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nqtQuanTri; // Import the nqtQuanTri model
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
class NQT_QUAN_TRIController extends Controller
{
    // GET: Show the login page
    public function nqtlogin(Request $request)
    {
        // Kiểm tra nếu session 'admin' tồn tại
        if ($request->session()->has('admin')) {
            // Nếu có session, chuyển hướng đến dashboard
            return redirect()->route('nqtadmin.getSession1'); // Thay 'dashboard' bằng route thực tế của bạn
        }

        // Nếu không có session, hiển thị trang đăng nhập
        return view("nqtLogin.nqt-login");
    }


    // POST: Handle login submission
    public function nqtloginSubmit(Request $request)
    {
        // Validate đầu vào
        $request->validate([
            'nqtusername' => 'required|min:6',
            'nqtpassword' => 'required|min:6',
        ]);

        // Lấy dữ liệu đầu vào
        $data = $request->only(['nqtusername', 'nqtpassword']);

        // Kiểm tra user trong database
        $admin = nqtQuanTri::where('nqtTaiKhoan', $data['nqtusername'])->first();

        // Nếu user tồn tại và mật khẩu đúng
        if ($admin && md5($data['nqtpassword']) === $admin->nqtMatKhau) {
            // Chuẩn bị dữ liệu session
            $sessionData = [
                'id' => $admin->id,
                'email' => $admin->nqtTaiKhoan,
                'status' => $admin->nqtTrangThai,
            ];

            // Thiết lập thời gian sống mặc định
            $lifetime = env('SESSION_LIFETIME', 120); // Mặc định 2 giờ nếu không set trong .env

            // Xử lý remember me
            if ($request->has('remember')) {
                // Set lifetime là 30 ngày nếu check remember
                $lifetime = 43200; // 30 ngày tính bằng phút

                // Set cookie remember
                Cookie::queue('remember', 'true', $lifetime);

                // Set các cookie session với lifetime 30 ngày
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
            } else {
                // Nếu không check remember, xóa cookie remember nếu có
                Cookie::queue(Cookie::forget('remember'));

                // Set các cookie session với lifetime mặc định
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

            // Lưu session data
            $request->session()->put('admin', $sessionData);

            // Redirect sau khi đăng nhập thành công
            return redirect('/nqt-admin')->with('nqt-success', 'Đăng nhập thành công!');
        }

        // Trả về lỗi nếu đăng nhập thất bại
        return redirect()->back()->with('nqt-error', 'Lỗi đăng nhập: Tên đăng nhập hoặc mật khẩu không đúng.');
    }




}

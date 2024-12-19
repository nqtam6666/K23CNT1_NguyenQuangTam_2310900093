<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nqtQuanTri; // Import the nqtQuanTri model

class NQT_QUAN_TRIController extends Controller
{
    // GET: Show the login page
    public function nqtlogin(Request $request)
    {
        // Kiểm tra nếu session 'admin' tồn tại
        if ($request->session()->has('admin')) {
            // Nếu có session, chuyển hướng đến dashboard
            return redirect()->route('admin.getSession'); // Thay 'dashboard' bằng route thực tế của bạn
        }

        // Nếu không có session, hiển thị trang đăng nhập
        return view("nqtLogin.nqt-login");
    }


    // POST: Handle login submission
    public function nqtloginSubmit(Request $request)
    {
        // Validate the input
        $request->validate([
            'nqtusername' => 'required|min:6',
            'nqtpassword' => 'required|min:6',
        ]);

        // Retrieve the input data
        $data = $request->only(['nqtusername', 'nqtpassword']);

        // Check if the user exists in the database
        $admin = nqtQuanTri::where('nqtTaiKhoan', $data['nqtusername'])->first();

        // If the user exists and the password is correct
        if ($admin && md5($data['nqtpassword']) === $admin->nqtMatKhau) {
            // Store user data in the session
            $request->session()->put('admin', [
                'id' => $admin->id,
                'email' => $admin->nqtTaiKhoan,
                'status' => $admin->nqtTrangThai,
            ]);

            // Redirect to the homepage
            return redirect('/dashboard')->with('nqt-success', 'Đăng nhập thành công!');
        }

        // If authentication fails, redirect back with an error
        return redirect()->back()->with('nqt-error', 'Lỗi đăng nhập: Tên đăng nhập hoặc mật khẩu không đúng.');
    }
}

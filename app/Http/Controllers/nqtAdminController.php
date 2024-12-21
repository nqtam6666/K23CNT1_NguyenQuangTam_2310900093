<?php

namespace App\Http\Controllers;

use App\Models\nqtQuanTri;
use Illuminate\Http\Request;

class nqtAdminController extends nqtBaseAdminController
{
    public function nqtList(){
        $nqtALLAdmin = nqtQuanTri::all();
        return view("nqtadmin.nqtAdmin.nqtList", compact("nqtALLAdmin"));
    }
    public function nqtCreate(){
        return view('nqtadmin.nqtAdmin.nqtCreate');
    }
    public function nqtCreateSubmit(Request $request)
    {
        // Validate dữ liệu từ form
        $validatedData = $request->validate([
            'nqtTaiKhoan' => 'required|string|min:6|max:255',
            'nqtMatKhau' => 'required|min:6',
            'nqtTrangThai' => 'required|in:1,0',
        ], [
            'nqtTaiKhoan.required' => 'Tài khoản là bắt buộc.',
            'nqtMatKhau.required' => 'Mật khẩu là bắt buộc.',
            'nqtTrangThai.required'=> 'Trạng thái bắt buộc'
        ]);

        // Tạo đối tượng sản phẩm mới
        $nqtQuanTri = new nqtQuanTri;
        $nqtQuanTri->nqtTaiKhoan  = $request->nqtTaiKhoan;
        $nqtQuanTri->nqtMatKhau = md5($request->nqtMatKhau);
        $nqtQuanTri->nqtTrangThai = $request->nqtTrangThai;
        $nqtQuanTri->save();
        return redirect()->route('nqtadmin.nqtListAdmin')->with('message', 'Thêm tài khoản quản trị thành công!');

    }
    public function nqtchitietadmin($nqtID)
    {
        $nqtadmin = nqtQuanTri::where('id', $nqtID)->first();

        // Nếu không tìm thấy loại sản phẩm
        if (!$nqtadmin) {
            return redirect()->route('nqtadmin.nqtListAdmin');
        }

        // Trả về view với dữ liệu loại sản phẩm
        return view('nqtadmin.nqtadmin.nqtDetail', compact('nqtadmin'));
    }
    public function nqteditadmin($nqtID){
        $nqtadmin = nqtQuanTri::where('id', $nqtID)->first();
        if (!$nqtadmin) {
            return redirect()->route('nqtadmin.nqtListAdmin');
        }
        return view('nqtadmin.nqtadmin.nqtEdit', compact('nqtadmin'));
    }
    public function nqteditadminSubmit(Request $request)
    {
        // Lấy dữ liệu từ form
        $id_ = $request->nqtID;  // Hoặc $request->nqtID
        $nqtTaiKhoan  = $request->nqtTaiKhoan; // Mã loại sản phẩm
        $nqtMatKhau = md5($request->nqtMatKhau); // Tên loại sản phẩm
        $nqtTrangThai = $request->nqtTrangThai; // Trạng thái sản phẩm

        // Lấy bản ghi cần cập nhật từ database
        $nqtEdit = nqtQuanTri::where('id', $id_)->first();

        // Kiểm tra xem bản ghi có tồn tại không
        if ($nqtEdit) {
            // Cập nhật các trường dữ liệu
            $nqtEdit->nqtTaiKhoan = $nqtTaiKhoan;
            $nqtEdit->nqtMatKhau = $nqtMatKhau;
            $nqtEdit->nqtTrangThai = $nqtTrangThai;

            // Lưu lại thay đổi vào database
            $nqtEdit->save();

            // Redirect về trang cần thiết với thông báo thành công
            return redirect()->route('nqtadmin.nqtListAdmin')->with('message', 'Sửa loại sản phẩm thành công!'.'$id');
        } else {
            // Xử lý nếu không tìm thấy bản ghi
            return redirect()->route('nqtadmin.nqtListAdmin')->with('message', 'Không có bản ghi!');
        }
    }
    public function nqtdeleteadmin($nqtID){
        $nqtadmin = nqtQuanTri::findOrFail($nqtID);
        $nqtadmin->delete();

        return redirect()->route('nqtadmin.nqtListAdmin')->with('message', 'Tài khoản admin đã được xoá thành công!');
    }
}

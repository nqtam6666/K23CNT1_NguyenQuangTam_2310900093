<?php

namespace App\Http\Controllers;

use App\Models\nqtLoaiSanPham;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class nqtLoaiSanPhamController extends nqtBaseAdminController
{
    public function nqtList(Request $request)
    {
        $search = $request->query('search');

        $query = nqtLoaiSanPham::query();

        if ($search) {
            $query->where('nqtMaLoai', 'like', '%' . $search . '%')
                ->orWhere('nqtTenLoai', 'like', '%' . $search . '%');
        }

        $nqtloaisp = $query->paginate(10);

        return view("nqtAdmin.nqtLoaiSanPham.nqtList", ['nqtloaisp' => $nqtloaisp]);
    }


    public function nqtCreate(){
        return view('nqtAdmin.nqtLoaiSanPham.nqtCreate');
    }
    public function nqtCreateSubmit(request $request){
        // Áp dụng validation
        $validated = $request->validate([
            'nqtMaLoai' => 'required|min:1|unique:nqt_loai_san_pham,nqtMaLoai',
            'nqtTenLoai' => 'required|string|min:1|max:255',
            'nqtTrangThai' => 'required|boolean',
        ]);

        // Nếu dữ liệu hợp lệ, tiếp tục lưu
        $nqtLoaiSanPham = new nqtLoaiSanPham;
        $nqtLoaiSanPham->nqtMaLoai = $request->nqtMaLoai;
        $nqtLoaiSanPham->nqtTenLoai = $request->nqtTenLoai;
        $nqtLoaiSanPham->nqtTrangThai = (bool) $request->nqtTrangThai;

        $nqtLoaiSanPham->save();
        return redirect()->route('nqtadmin.nqtloaisanpham')->with('message', 'Thêm loại sản phẩm thành công!');
    }

    public function nqtchitietloaisp($nqtID)
    {
        // Truy vấn dữ liệu từ bảng nqtLoaiSanPham theo mã loại sản phẩm
        $nqtLoaiSanPham = nqtLoaiSanPham::where('id', $nqtID)->first();

        // Nếu không tìm thấy loại sản phẩm
        if (!$nqtLoaiSanPham) {
            return redirect()->route('nqtadmin.nqtloaisanpham');
        }

        // Trả về view với dữ liệu loại sản phẩm
        return view('nqtadmin.nqtloaisanpham.nqtDetail', compact('nqtLoaiSanPham'));
    }
    public function nqteditloaisp($nqtID){
        $nqtLoaiSanPham = nqtLoaiSanPham::where('id', $nqtID)->first();
        if (!$nqtLoaiSanPham) {
            return redirect()->route('nqtadmin.nqtloaisanpham');
        }
        return view('nqtadmin.nqtloaisanpham.nqtEdit', compact('nqtLoaiSanPham'));
    }
    public function nqteditloaispSubmit(Request $request)
    {
        // Lấy dữ liệu từ form
        $nqtMaLoai = $request->nqtMaLoai; // Mã loại sản phẩm
        $nqtTenLoai = $request->nqtTenLoai; // Tên loại sản phẩm
        $nqtTrangThai = $request->nqtTrangThai; // Trạng thái sản phẩm

        // Lấy bản ghi cần cập nhật từ database
        $nqtLoaiSanPham = nqtLoaiSanPham::where('nqtMaLoai', $nqtMaLoai)->first();

        // Kiểm tra xem bản ghi có tồn tại không
        if ($nqtLoaiSanPham) {
            // Cập nhật các trường dữ liệu
            $nqtLoaiSanPham->nqtTenLoai = $nqtTenLoai;
            $nqtLoaiSanPham->nqtTrangThai = $nqtTrangThai;

            // Lưu lại thay đổi vào database
            $nqtLoaiSanPham->save();

            // Redirect về trang cần thiết với thông báo thành công
            return redirect()->route('nqtadmin.nqtloaisanpham')->with('message', 'Sửa loại sản phẩm thành công!');
        } else {
            // Xử lý nếu không tìm thấy bản ghi
            return redirect()->route('nqtadmin.nqtloaisanpham')->with('message', 'Không có bản ghi!');
        }
    }
    public function nqtdeleteloaisp($nqtID){
        $nqtLoaiSanPham = nqtLoaiSanPham::findOrFail($nqtID);
        $nqtLoaiSanPham->delete();

        return redirect()->route('nqtadmin.nqtloaisanpham')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }
    public function nqtSearch(Request $request)
    {
        $search = $request->query('search');

        // Use paginate() instead of get() for consistent pagination
        if ($search) {
            $nqtloaisp = nqtLoaiSanPham::where('nqtMaLoai', 'like', '%' . $search . '%')
                ->orWhere('nqtTenLoai', 'like', '%' . $search . '%')
                ->paginate(10);  // Use the same number as in nqtList
        } else {
            // Use paginate() instead of all()
            $nqtloaisp = nqtLoaiSanPham::paginate(10);
        }

        return view("nqtAdmin.nqtLoaiSanPham.nqtList", ['nqtloaisp' => $nqtloaisp]);
    }

}

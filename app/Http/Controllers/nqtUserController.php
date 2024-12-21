<?php

namespace App\Http\Controllers;

use App\Models\nqtKhachHang;
use Illuminate\Http\Request;

class nqtUserController extends nqtBaseAdminController
{
    public function nqtList(){
        $nqtKhachHang = nqtKhachHang::all();
        return view("nqtAdmin.nqtNguoiDung.nqtList", compact("nqtKhachHang"));
    }
    public function nqtCreateUser(){
        $nqtKhachHang = nqtKhachHang::all();
        return view('nqtadmin.nqtNguoiDung.nqtCreate', compact('nqtKhachHang'));
    }
    public function nqtCreateUserSubmit(Request $request)
    {
        // Validate dữ liệu từ form
        $validatedData = $request->validate([
            'nqtTenSanPham' => 'required|string|max:255',
            'nqtSoLuong' => 'required|integer|min:1',
            'nqtDonGia' => 'required|numeric|min:0',
            'nqtMaLoai' => 'required',
            'nqtTrangThai' => 'required|in:1,0',
            'nqtHinhAnh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nqtTenSanPham.required' => 'Tên sản phẩm là bắt buộc.',
            'nqtSoLuong.required' => 'Số lượng sản phẩm là bắt buộc.',
            'nqtDonGia.required' => 'Đơn giá là bắt buộc.',
            'nqtHinhAnh.image' => 'Hình ảnh phải có định dạng hợp lệ (jpg, jpeg, png, gif).',
            'nqtHinhAnh.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);

        // Tạo đối tượng sản phẩm mới
        $nqtSanPham = new nqtSanPham;
        $nqtSanPham->nqtMaSanPham = $request->nqtMaSanPham;
        $nqtSanPham->nqtTenSanPham = $request->nqtTenSanPham;
        $nqtSanPham->nqtSoLuong = $request->nqtSoLuong;
        $nqtSanPham->nqtDonGia = $request->nqtDonGia;
        $nqtSanPham->nqtMaLoai = $request->nqtMaLoai;
        $nqtSanPham->nqtTrangThai = $request->nqtTrangThai;

        // Xử lý hình ảnh nếu có
        if ($request->hasFile('nqtHinhAnh')) {
            $image = $request->file('nqtHinhAnh');
            if ($image->isValid()) {
                // Tạo tên file ảnh duy nhất
                $fileName = time() . '_' . $image->getClientOriginalName();
                // Di chuyển tệp vào thư mục lưu trữ cố định
                $image->move(public_path('images/san-pham'), $fileName);

                // Lưu đường dẫn vào CSDL
                $nqtSanPham->nqtHinhAnh = 'images/san-pham/' . $fileName;
            } else {
                return redirect()->back()->with('error', 'Ảnh không hợp lệ hoặc không được chọn.');
            }
        }


        try {
            $nqtSanPham->save();
            return redirect()->route('nqtadmin.nqtSanPhams')->with('nqt-success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\nqtLoaiSanPham;
use App\Models\nqtSanPham;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class nqtSanPhamController extends nqtBaseAdminController
{
    public function nqtList(){
        $nqtSanPhams = nqtSanPham::paginate(5);
        return view("nqtadmin.nqtSanPham.nqtList", ['nqtSanPhams'=>$nqtSanPhams]);
    }
    public function nqtCreate(){
        $nqtLoaiSanPhams = nqtLoaiSanPham::all();
        return view('nqtadmin.nqtSanPham.nqtCreate', compact('nqtLoaiSanPhams'));
    }
    public function nqtCreateSubmit(Request $request)
    {
        // Validate dữ liệu từ form
        $validatedData = $request->validate([
            'nqtMaSanPham' => 'required|min:1|unique:nqt_san_pham,nqtMaSanPham',
            'nqtTenSanPham' => 'required|string|max:255',
            'nqtSoLuong' => 'required|integer|min:1',
            'nqtDonGia' => 'required|numeric|min:0',
            'nqtTrangThai' => 'required|in:1,0',
            'nqtMaLoai'=>'required',
            'nqtHinhAnh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nqtMaSanPham.required'=>'Mã sản phẩm là bắt buộc',
            'nqtMaSanPham.unique'=> 'Mã này đã tồn tại',
            'nqtTenSanPham.required' => 'Tên sản phẩm là bắt buộc.',
            'nqtSoLuong.required' => 'Số lượng sản phẩm là bắt buộc.',
            'nqtDonGia.required' => 'Đơn giá là bắt buộc.',
            'nqtMaLoai.required'=>'Mã loại là bắt buộc',
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
            // Lưu sản phẩm vào cơ sở dữ liệu
            $nqtSanPham->save();
            return redirect()->route('nqtadmin.nqtSanPhams')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm: ' . $e->getMessage());
        }
    }




    public function nqtchitietsp($nqtID)
    {
        // Truy vấn dữ liệu từ bảng nqtsanpham theo mã loại sản phẩm
        $nqtSanPham = nqtSanPham::where('id', $nqtID)->first();

        // Nếu không tìm thấy loại sản phẩm
        if (!$nqtSanPham) {
            return redirect()->route('nqtadmin.nqtSanPhams');
        }

        // Trả về view với dữ liệu loại sản phẩm
        return view('nqtadmin.nqtSanPham.nqtDetail', compact('nqtSanPham'));
    }
    public function nqteditsp($nqtID){
        $nqtSanPham = nqtsanpham::where('id', $nqtID)->first();
        if (!$nqtSanPham) {
            return redirect()->route('nqtadmin.nqtSanPhams');
        }
        $nqtLoaiSanPhams = nqtLoaiSanPham::all();
        return view('nqtadmin.nqtSanPham.nqtEdit', compact('nqtSanPham', 'nqtLoaiSanPhams'));
    }
    public function nqteditspSubmit(Request $request)
    {
        try {
            // Tìm sản phẩm
            $nqtsanpham = nqtsanpham::find($request->nqtID);

            if ($nqtsanpham) {
                if ($request->hasFile('nqtHinhAnh')) {
                    $image = $request->file('nqtHinhAnh');
                    if ($image->isValid()) {
                        // Tạo tên file ảnh duy nhất
                        $fileName = time() . '_' . $image->getClientOriginalName();
                        // Di chuyển tệp vào thư mục lưu trữ cố định
                        $image->move(public_path('images/san-pham'), $fileName);

                        // Lưu đường dẫn vào CSDL
                        $nqtsanpham->nqtHinhAnh = 'images/san-pham/' . $fileName;
                    } else {
                        return redirect()->back()->with('error', 'Ảnh không hợp lệ hoặc không được chọn.');
                    }
                }

                // Cập nhật các trường khác
                $nqtsanpham->nqtTenSanPham = $request->nqtTenSanPham;
                $nqtsanpham->nqtSoLuong = $request->nqtSoLuong;
                $nqtsanpham->nqtDonGia = $request->nqtDonGia;
                $nqtsanpham->nqtMaLoai = $request->nqtMaLoai;
                $nqtsanpham->nqtTrangThai = $request->nqtTrangThai;

                $nqtsanpham->save();

                return redirect()
                    ->route('nqtadmin.nqtSanPhams')
                    ->with('message', 'Sửa sản phẩm thành công!');
            }

            return redirect()
                ->route('nqtadmin.nqtSanPhams')
                ->with('error', 'Không tìm thấy sản phẩm!');

        } catch (\Exception $e) {
            Log::error('Upload error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }



    public function nqtdeletesp($nqtID){
        $nqtsanpham = nqtsanpham::findOrFail($nqtID);
        $nqtsanpham->delete();

        return redirect()->route('nqtadmin.nqtSanPhams')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }

    public function nqtSearch(Request $request)
    {
        $search = $request->query('nqt-search-sp');
        $perPage = 5; // Số item cố định trên mỗi trang

        if ($search) {
            $nqtSanPhams = nqtSanPham::where('nqtTenSanPham', 'like', '%' . $search . '%')
                ->orWhere('nqtMaSanPham', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            $nqtSanPhams = nqtSanPham::paginate($perPage);
        }

        return view("nqtadmin.nqtSanPham.nqtList", ['nqtSanPhams' => $nqtSanPhams]);
    }



}

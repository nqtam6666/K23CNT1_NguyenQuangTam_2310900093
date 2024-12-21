@extends('_layouts.admin.master')
@section('title', 'Thêm sản phẩm')
@section('content-body')
<style>
    .input {
        font-size: larger;
        font-weight: bolder;
    }

    input[type="file"] {
        margin-top: -10px;
        padding: 15px;
        font-size: 16px;
        border: 2px solid #ced4da;
        border-radius: 5px;
        background-color: #f8f9fa;
        cursor: pointer;
    }

    input[type="file"]:hover {
        border-color: #80bdff;
        background-color: #e9ecef;
    }

    input[type="file"]:focus {
        border-color: #80bdff;
        outline: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('nqtadmin.nqtCreateSPsubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Thêm mới sản phẩm</h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtMaSanPham" class="col-form-label">Mã sản phẩm</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtMaSanPham" class="form-control" name="nqtMaSanPham" style="height: 60px">
                            </div>
                            @error('nqtMaSanPham')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtTenSanPham" class="col-form-label">Tên sản phẩm</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtTenSanPham" class="form-control" name='nqtTenSanPham' style="height: 60px">
                            </div>
                            @error('nqtTenSanPham')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtHinhAnh" class="col-form-label">Hình ảnh</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="nqtHinhAnh" id="nqtHinhAnh" style="height: 60px;">
                                </div>
                                @error('nqtHinhAnh')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtSoLuong" class="col-form-label">Số lượng</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="number" id="nqtSoLuong" class="form-control" name='nqtSoLuong' style="height: 60px">
                            </div>
                            @error('nqtSoLuong')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtDonGia" class="col-form-label">Đơn giá</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="number" id="nqtDonGia" class="form-control" name='nqtDonGia' style="height: 60px">
                            </div>
                            @error('nqtDonGia')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtMaLoai" class="col-form-label">Mã loại</label>
                            </div>
                            <div class="col-3 border-3">
                                <select class="form-select" name="nqtMaLoai" style="font-size: 1.5rem; border-width: 3px; border-style: solid; height: 60px;">
                                    <option value="" disabled selected>Chọn mã loại</option>
                                    @foreach($nqtLoaiSanPhams as $loai)
                                        <option value="{{ $loai->nqtMaLoai }}">
                                            {{ $loai->nqtTenLoai }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('nqtMaLoai')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-2">
                            <div class="col-lg-1">
                                <label for="nqtTrangThai" class="col-form-label">Trạng thái</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <select class="form-select" name="nqtTrangThai" style="font-size: 1.5rem; border-width: 3px;  border-style: solid; height: 60px;">
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Thêm</button>
                        <a href="{{ route('nqtadmin.nqtSanPhams') }}" class="btn btn-primary">Quay lại</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

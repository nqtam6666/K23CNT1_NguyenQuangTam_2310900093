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
            <form action="{{ route('nqtadmin.nqtCreateUsersubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Thêm mới khách hàng</h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtMaKhachHang" class="col-form-label">Mã khách hàng</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtMaKhachHang" class="form-control" name="nqtMaKhachHang" style="height: 60px">
                            </div>
                            @error('nqtMaKhachHang')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtHoTenKhachHang" class="col-form-label">Họ và tên khách hàng</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtHoTenKhachHang" class="form-control" name='nqtHoTenKhachHang' style="height: 60px">
                            </div>
                            @error('nqtHoTenKhachHang')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtEmail" class="col-form-label">Email</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtEmail" class="form-control" name='nqtEmail' style="height: 60px">
                            </div>
                            @error('nqtEmail')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtMatKhau" class="col-form-label">Mật khẩu</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtMatKhau" class="form-control" name='nqtMatKhau' style="height: 60px">
                            </div>
                            @error('nqtMatKhau')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtDienThoai" class="col-form-label">Điện thoại</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtDienThoai" class="form-control" name='nqtDienThoai' style="height: 60px">
                            </div>
                            @error('nqtDienThoai')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtDiaChi" class="col-form-label">Địa chỉ</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="text" id="nqtDiaChi" class="form-control" name='nqtDiaChi' style="height: 60px">
                            </div>
                            @error('nqtDiaChi')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-lg-1">
                                <label for="nqtNgayDangKy" class="col-form-label">Ngày đăng ký</label>
                            </div>
                            <div class="col-lg-3 border-3">
                                <input type="date" id="nqtNgayDangKy" class="form-control" name='nqtNgayDangKy' style="height: 60px">
                            </div>
                            @error('nqtNgayDangKy')
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

@extends('_layouts.admin.master')
@section('title', 'Thêm admin')
@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('nqtadmin.nqtCreateAdminsubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm mới admin</h2>
                        </div>
                        <div class="card-body ">
                            <div class="row g-5 align-items-center mb-3">
                                <div class="col-auto">
                                    <label for="nqtTaiKhoan" class="col-form-label">Tài khoản</label>
                                </div>
                                <div class="col-auto">
                                  <input type="text" id="nqtTaiKhoan" class="form-control" name="nqtTaiKhoan">
                                </div>
                                @error('nqtTaiKhoan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row g-5 align-items-center mb-3">
                                <div class="col-auto">
                                    <label for="nqtMatKhau" class="col-form-label">Mật khẩu</label>
                                </div>
                                <div class="col-auto">
                                  <input type="text" id="nqtMatKhau" class="form-control" name='nqtMatKhau'>
                                </div>
                            </div>
                            <div class="row g-5 align-items-center mb-2">
                                <div class="col-auto">
                                    <label for="nqtTrangThai" class="col-form-label mr-3">Trạng thái</label>
                                </div>
                                <div class="col-auto">
                                    <input type="radio" id="TrangThai1" name="nqtTrangThai" class="form-check-input mr-2" value="1" checked>
                                    <label for="TrangThai1" class="form-check-label">Hoạt động</label>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                    <input type="radio" id="TrangThai0" name="nqtTrangThai" class="form-check-input mr-2" value="0">
                                    <label for="TrangThai0" class="form-check-label">Khoá</label>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Thêm</button>
                            <a href="{{route('nqtadmin.nqtListAdmin')}}" class="btn btn-primary">Quay lại
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

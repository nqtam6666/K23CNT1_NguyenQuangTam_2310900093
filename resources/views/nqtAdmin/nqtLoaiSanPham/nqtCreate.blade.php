@extends('_layouts.admin.master')
@section('title', 'Thêm loại sản phẩm')
@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('nqtadmin.nqtCreateLoaiSPsubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm mới loại sản phẩm</h2>
                        </div>
                        <div class="card-body ">
                            <div class="row g-5 align-items-center mb-3">
                                <div class="col-auto">
                                    <label for="nqtMaLoai" class="col-form-label">Mã Loại</label>
                                </div>
                                <div class="col-auto">
                                  <input type="text" id="nqtMaLoai" class="form-control" name="nqtMaLoai">
                                </div>
                                @error('nqtMaLoai')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row g-5 align-items-center mb-3">
                                <div class="col-auto">
                                    <label for="nqtTenLoai" class="col-form-label">Tên Loại</label>
                                </div>
                                <div class="col-auto">
                                  <input type="text" id="nqtTenLoai" class="form-control" name='nqtTenLoai'>
                                </div>
                                @error('nqtTenLoai')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row g-5 align-items-center mb-2">
                                <div class="col-auto">
                                    <label for="nqtTrangThai" class="col-form-label">Trạng thái</label>
                                </div>
                                <div class="col-auto">
                                    <input type="radio" id="TrangThai1" name="nqtTrangThai" class="form-check-input mr-2" value="1" checked>
                                    <label for="TrangThai1" class="form-check-label">Hiển thị</label>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                    <input type="radio" id="TrangThai0" name="nqtTrangThai" class="form-check-input mr-2" value="0">
                                    <label for="TrangThai0" class="form-check-label">Ẩn</label>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Thêm</button>
                            <a href="/nqt-admin/nqt-loai-san-pham" class="btn btn-primary">Quay lại
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

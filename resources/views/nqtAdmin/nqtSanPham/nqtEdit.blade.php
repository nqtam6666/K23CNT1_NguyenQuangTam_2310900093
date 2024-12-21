@extends('_layouts.admin.master')
@section('title', 'Chi Tiết sản phẩm')
@section('content-body')
    <div class="container">
        <div class="row mb-3">
            <h1>Chi tiết sản phẩm</h1>
        </div>
        <form action="{{route('nqtadmin.nqteditspSubmit', ['nqtID' => $nqtSanPham->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="mb-3">
                <div class="row mb-3">
                    <div class="col-3">
                        <label class=" h2 mt-2">Mã sản phẩm: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtSanPham->nqtMaSanPham}}" readonly  style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="h2 mt-2">Tên sản phẩm: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtSanPham->nqtTenSanPham}}" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px" name="nqtTenSanPham">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="h2 mt-2">Hình ảnh: </label>
                    </div>
                    <div class="col-3">
                        <img src="{{ asset($nqtSanPham->nqtHinhAnh) }}" alt="Hình ảnh sản phẩm" style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-sm-3 mt-3">
                        <input type="file" class="form-control" name="nqtHinhAnh" id="nqtHinhAnh">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="h2 mt-2">Số lượng: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtSanPham->nqtSoLuong}}" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px" name="nqtSoLuong">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="h2 mt-2">Đơn giá: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtSanPham->nqtDonGia}}" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px" name="nqtDonGia">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="h2 mt-2">Mã loại: </label>
                    </div>
                    <div class="col-3">
                        <select class="form-select" name="nqtMaLoai" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                            @foreach($nqtLoaiSanPhams as $loai)
                                <option value="{{ $loai->nqtMaLoai }}"
                                    {{ $nqtSanPham->nqtMaLoai == $loai->nqtMaLoai ? 'selected' : '' }}>
                                    {{ $loai->nqtTenLoai }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="h2 mt-2">Trạng thái: </label>
                    </div>
                    <div class="col-3">
                        <select class="form-select" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height: 60px;" name="nqtTrangThai">
                            <option value="1" {{ $nqtSanPham->nqtTrangThai == 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ $nqtSanPham->nqtTrangThai == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>

                    </div>
                </div>
            </section>
            <button class="btn btn-success">Sửa</button>
            <a href="{{route('nqtadmin.nqtSanPhams')}}" class="btn btn-primary">Quay về</a>
        </form>

    </div>
@endsection

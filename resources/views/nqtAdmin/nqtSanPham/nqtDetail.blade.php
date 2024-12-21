@extends('_layouts.admin.master')
@section('title', 'Chi Tiết sản phẩm')
@section('content-body')
    <div class="container">
        <div class="row mb-3">
            <h1>Chi tiết sản phẩm</h1>
        </div>
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
                    <input class="form-control" value="{{$nqtSanPham->nqtTenSanPham}}" readonly style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label class="h2 mt-2">Hình ảnh: </label>
                </div>
                <div class="col-3">
                    <img src="{{ asset('storage/' . $nqtSanPham->nqtHinhAnh) }}" alt="Hình ảnh sản phẩm" style="max-width: 300px; height: auto;">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label class="h2 mt-2">Số lượng: </label>
                </div>
                <div class="col-3">
                    <input class="form-control" value="{{$nqtSanPham->nqtSoLuong}}" readonly style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label class="h2 mt-2">Đơn giá: </label>
                </div>
                <div class="col-3">
                    <input class="form-control" value="{{$nqtSanPham->nqtDonGia}}" readonly style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label class="h2 mt-2">Mã loại: </label>
                </div>
                <div class="col-3">
                    <input class="form-control" value="{{$nqtSanPham->nqtMaLoai}}" readonly style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label class="h2 mt-2">Trạng thái: </label>
                </div>
                <div class="col-3">
                    <input class="form-control" value="{{ $nqtSanPham->nqtTrangThai == 1 ? 'Hiển thị' : 'Ẩn' }}" readonly style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
        </section>
        <a href="{{route('nqtadmin.nqtSanPhams')}}" class="btn btn-primary">Quay về</a>
    </div>
@endsection

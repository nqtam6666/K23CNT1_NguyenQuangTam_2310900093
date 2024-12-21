@extends('_layouts.admin.master')
@section('title', 'Sửa loại sản phẩm')
@section('content-body')
    <div class="container my-4">
        @if (session('message'))
        <div class="alert alert-success"style="font-weight: bold;">
            {{ session('message') }}
        </div>
        @endif
        <div class="row mb-3">
            <h1>Sửa loại sản phẩm</h1>
        </div>
        <form action="{{route('nqtadmin.nqteditloaispSubmit', ['nqtID' => $nqtLoaiSanPham->id])}}" method="POST">
            @csrf
            <section class="mb-3">
                <div class="row mb-3">
                    <div class="col-2">
                        <label class=" h2 mt-2">Mã Loại: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtLoaiSanPham->nqtMaLoai}}" readonly name="nqtMaLoai" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2">
                        <label class="h2 mt-2">Tên Loại: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtLoaiSanPham->nqtTenLoai}}" name="nqtTenLoai" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2">
                        <label class="h2 mt-2">Trạng thái: </label>
                    </div>
                    <div class="col-3">
                        <select class="form-select" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height: 60px;" name="nqtTrangThai">
                            <option value="1" {{ $nqtLoaiSanPham->nqtTrangThai == 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ $nqtLoaiSanPham->nqtTrangThai == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>

                    </div>
                </div>

            </section>
            <div>
                <button class="btn btn-success">Sửa</button>
                <a href="{{route('nqtadmin.nqtloaisanpham')}}" class="btn btn-primary">Quay về</a>
            </div>
        </form>

    </div>
@endsection

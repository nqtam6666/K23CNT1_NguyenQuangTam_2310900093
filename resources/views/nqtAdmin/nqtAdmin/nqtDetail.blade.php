@extends('_layouts.admin.master')
@section('title', 'Chi Tiết tài khoản quản trị')
@section('content-body')
    <div class="container">
        <div class="row mb-3">
            <h1>Chi tiết tài khoản quản trị</h1>
        </div>
        <section class="mb-3">
            <div class="row mb-3">
                <div class="col-2">
                    <label class=" h2 mt-2">Tài khoản: </label>
                </div>
                <div class="col-3">
                    <input class="form-control" value="{{$nqtadmin->nqtTaiKhoan }}" readonly  style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <label class="h2 mt-2">Mật khẩu: </label>
                </div>
                <div class="col-3">
                    <input class="form-control" value="{{$nqtadmin->nqtMatKhau}}" readonly style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <label class="h2 mt-2">Trạng thái: </label>
                </div>
                <div class="col-3">
                    <input class="form-control" value="{{ $nqtadmin->nqtTrangThai == 1 ? 'Hiển thị' : 'Ẩn' }}" readonly style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                </div>
            </div>
        </section>
        <a href="{{route('nqtadmin.nqtListAdmin')}}" class="btn btn-primary">Quay về</a>
    </div>
@endsection

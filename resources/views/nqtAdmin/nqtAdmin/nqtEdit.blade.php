@extends('_layouts.admin.master')
@section('title', 'Sửa tài khoản quản trị')
@section('content-body')
    <div class="container">
        <div class="row mb-3">
            <h1>Sửa tài khoản quản trị</h1>
        </div>
        <form action="{{route('nqtadmin.nqteditadminSubmit', ['nqtID' => $nqtadmin->id])}}" method="POST">
            @csrf
            <section class="mb-3">
                <div class="row mb-3">
                    <div class="col-2">
                        <label class=" h2 mt-2">Tài khoản: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtadmin->nqtTaiKhoan}}" name="nqtTaiKhoan" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2">
                        <label class="h2 mt-2">Mật khẩu: </label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" value="{{$nqtadmin->nqtMatKhau}}" name="nqtMatKhau" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height:60px">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2">
                        <label class="h2 mt-2">Trạng thái: </label>
                    </div>
                    <div class="col-3">
                        <select class="form-select" style="font-size: 1.5rem; border-width: 2px; border-color: black; border-style: solid; height: 60px;" name="nqtTrangThai">
                            <option value="1" {{ $nqtadmin->nqtTrangThai == 1 ? 'selected' : '' }}>Hoạt động</option>
                            <option value="0" {{ $nqtadmin->nqtTrangThai == 0 ? 'selected' : '' }}>Khoá</option>
                        </select>

                    </div>
                </div>
            </section>
            <div>
                <button class="btn btn-success">Sửa</button>
                <a href="{{route('nqtadmin.nqtListAdmin')}}" class="btn btn-primary">Quay về</a>
            </div>
        </form>

    </div>
@endsection

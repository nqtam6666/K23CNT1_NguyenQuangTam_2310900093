@extends('_layouts.admin.master')
@section('title', 'Dashboard')
@section('content-body')
<div class="container my-4">
    <!-- Thông báo thành công -->
    @if(session('nqt-success'))
        <div class="alert alert-success"style="font-weight: bold;">
            {{ session('nqt-success') }}
        </div>
    @endif

    <!-- Tiêu đề Dashboard -->
    <h1 class="my-4">Dashboard</h1>

    <!-- Thông tin tổng quan -->
    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-danger font-weight-bold">Tổng người dùng</h4>
                    <p class="card-text">Số lượng người dùng hiện tại: <strong>{{$nqttotalUsers}}</strong></p>
                    <a href="{{route('nqtadmin.nqtListUser')}}" class="btn btn-primary btn-block mt-3">Quản lý người dùng</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-danger font-weight-bold">Loại sản phẩm</h4>
                    <p class="card-text">Loại sản phẩm hiện có: <strong>{{$nqttotalTypeProducts}}</strong></p>
                    <a href="{{route('nqtadmin.nqtloaisanpham')}}" class="btn btn-primary btn-block mt-3">Quản lý loại sản phẩm</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-danger font-weight-bold">Sản phẩm</h4>
                    <p class="card-text">Số sản phẩm hiện có: <strong>{{$nqttotalProducts}}</strong></p>
                    <a href="{{route('nqtadmin.nqtSanPhams')}}" class="btn btn-primary btn-block mt-3">Quản lý sản phẩm</a>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-danger font-weight-bold">Tổng admin</h4>
                    <p class="card-text">Số admin hiện có: <strong>{{$nqttotalAdmins}}</strong></p>
                    <a href="{{route('nqtadmin.nqtListAdmin')}}" class="btn btn-primary btn-block mt-3">Quản lý admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-4">
        <!-- Thông báo thành công -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Tiêu đề Dashboard -->
        <h1 class="my-4">Dashboard Admin</h1>

        <!-- Thông tin tổng quan -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tổng người dùng</h4>
                        <p class="card-text">Số lượng người dùng hiện tại: {}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bài viết</h4>
                        <p class="card-text">Số bài viết hiện có: {}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bình luận</h4>
                        <p class="card-text">Số bình luận hiện có: {}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Các liên kết quản lý -->
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="" class="btn btn-primary btn-block">Quản lý người dùng</a>
            </div>
            <div class="col-md-4">
                <a href="" class="btn btn-primary btn-block">Quản lý bài viết</a>
            </div>
            <div class="col-md-4">
                <a href="" class="btn btn-primary btn-block">Quản lý bình luận</a>
            </div>
        </div>
    </div>

</body>
</html> --}}

@extends('_layouts.admin.master')
@section('title', 'Dashboard')
@section('content-body')
<div class="dashboard-container">
    <!-- Thông báo thành công -->
    @if(session('nqt-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('nqt-success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tiêu đề Dashboard -->
    <div class="dashboard-header">
        <h1>Dashboard Overview</h1>
        <p class="text-muted">Welcome to your admin dashboard</p>
    </div>

    <!-- Thông tin tổng quan -->
    <div class="row g-4">
        <!-- Card Users -->
        <div class="col-md-4 col-lg-3">
            <div class="stats-card">
                <div class="stats-card-body">
                    <div class="icon-box bg-primary-light">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-info">
                        <h5>Tổng người dùng</h5>
                        <h3>{{$nqttotalUsers}}</h3>
                    </div>
                    <a href="{{route('nqtadmin.nqtListUser')}}" class="stats-link">
                        Quản lý người dùng <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Product Types -->
        <div class="col-md-4 col-lg-3">
            <div class="stats-card">
                <div class="stats-card-body">
                    <div class="icon-box bg-success-light">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="stats-info">
                        <h5>Loại sản phẩm</h5>
                        <h3>{{$nqttotalTypeProducts}}</h3>
                    </div>
                    <a href="{{route('nqtadmin.nqtloaisanpham')}}" class="stats-link">
                        Quản lý loại sản phẩm <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Products -->
        <div class="col-md-4 col-lg-3">
            <div class="stats-card">
                <div class="stats-card-body">
                    <div class="icon-box bg-warning-light">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stats-info">
                        <h5>Sản phẩm</h5>
                        <h3>{{$nqttotalProducts}}</h3>
                    </div>
                    <a href="{{route('nqtadmin.nqtSanPhams')}}" class="stats-link">
                        Quản lý sản phẩm <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Admins -->
        <div class="col-md-4 col-lg-3">
            <div class="stats-card">
                <div class="stats-card-body">
                    <div class="icon-box bg-info-light">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="stats-info">
                        <h5>Tổng admin</h5>
                        <h3>{{$nqttotalAdmins}}</h3>
                    </div>
                    <a href="{{route('nqtadmin.nqtListAdmin')}}" class="stats-link">
                        Quản lý admin <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Orders -->
        <div class="col-md-4 col-lg-3">
            <div class="stats-card">
                <div class="stats-card-body">
                    <div class="icon-box bg-danger-light">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="stats-info">
                        <h5>Tổng hoá đơn</h5>
                        <h3>#</h3>
                    </div>
                    <a href="{{route('nqtadmin.nqtListHoaDon')}}" class="stats-link">
                        Quản lý hoá đơn <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.dashboard-container {
    padding: 1.5rem;
}

.dashboard-header {
    margin-bottom: 2rem;
}

.dashboard-header h1 {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #2c3e50;
}

.alert {
    border: none;
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    animation: slideIn 0.3s ease-out;
}

.stats-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 2rem rgba(0,0,0,.1);
}

.stats-card-body {
    padding: 1.5rem;
    position: relative;
}

.icon-box {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.icon-box i {
    font-size: 1.5rem;
}

.stats-info h5 {
    color: #6c757d;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.stats-info h3 {
    color: #2c3e50;
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.stats-link {
    color: #4a90e2;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: color 0.3s ease;
}

.stats-link i {
    margin-left: 0.5rem;
    transition: transform 0.3s ease;
}

.stats-link:hover {
    color: #357abd;
}

.stats-link:hover i {
    transform: translateX(5px);
}

/* Background colors for icon boxes */
.bg-primary-light {
    background: rgba(74, 144, 226, 0.1);
    color: #4a90e2;
}

.bg-success-light {
    background: rgba(39, 174, 96, 0.1);
    color: #27ae60;
}

.bg-warning-light {
    background: rgba(241, 196, 15, 0.1);
    color: #f1c40f;
}

.bg-info-light {
    background: rgba(52, 152, 219, 0.1);
    color: #3498db;
}

.bg-danger-light {
    background: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
}

@keyframes slideIn {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@media (max-width: 768px) {
    .stats-card {
        margin-bottom: 1rem;
    }
}
</style>
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
